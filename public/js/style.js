document.addEventListener('DOMContentLoaded', function() {
    const imageModal = document.getElementById('imageModal');
    const loginModal = document.getElementById('loginModal');
    const modalImg = document.getElementById('modalImage');
    const downloadBtn = document.getElementById('downloadBtn');
    const closeBtn = document.getElementsByClassName('close')[0];
    const closeLoginBtn = document.getElementsByClassName('close-login')[0];
    const remainingSpan = document.getElementById('remainingDownloads'); // Hiển thị số lượt

    let currentImageUrl = '';
    let currentTitle = '';
    let currentImageRelativePath = '';

    // Mở modal khi click ảnh
    document.querySelectorAll('.product-image-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            currentImageUrl = this.getAttribute('data-image');
            currentTitle = this.getAttribute('data-title');
            currentImageRelativePath = currentImageUrl.replace(window.location.origin + '/storage/', '');
            modalImg.src = currentImageUrl;
            imageModal.style.display = 'block';
            if (remainingSpan) remainingSpan.textContent = ''; // reset lượt còn lại
        });
    });

    // Đóng modal
    closeBtn.onclick = () => imageModal.style.display = 'none';
    closeLoginBtn.onclick = () => loginModal.style.display = 'none';
    window.onclick = event => {
        if (event.target == imageModal) imageModal.style.display = 'none';
        if (event.target == loginModal) loginModal.style.display = 'none';
    };

    // Tải ảnh
    downloadBtn.onclick = async function() {
        downloadBtn.disabled = true;
        downloadBtn.textContent = 'ĐANG TẢI...';

        try {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const response = await fetch('/download-image', {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ image_relative_path: currentImageRelativePath, title: currentTitle })
            });

            if (!response.ok) {
                const data = await response.json().catch(() => null);
                const errorMsg = data?.error || `Server error: ${response.status}`;

                if (response.status === 401) {
                    imageModal.style.display = 'none';
                    loginModal.style.display = 'block';
                    return;
                }

                if (response.status === 403 && data?.remaining_downloads !== undefined) {
                    if (remainingSpan) remainingSpan.textContent = `Lượt còn lại hôm nay: ${data.remaining_downloads}`;
                }

                alert(errorMsg);
                throw new Error(errorMsg);
            }

            // Blob download
            const blob = await response.blob();
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = currentTitle + '.jpg';
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);

            // Hiển thị lượt còn lại nếu có header
            const remaining = response.headers.get('X-Remaining-Downloads');
            if (remainingSpan && remaining !== null) {
                remainingSpan.textContent = `Lượt còn lại hôm nay: ${remaining}`;
            }

            alert('Tải xuống thành công!');
        } catch (error) {
            console.error('Download error:', error);
        } finally {
            downloadBtn.disabled = false;
            downloadBtn.textContent = 'TẢI XUỐNG';
        }
    };
});
