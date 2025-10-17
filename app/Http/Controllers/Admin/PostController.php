<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function  index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create() {
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // ✅ Validate
        $request->validate([
            'title' => 'required',
        ], [
            'title.required' => 'Mở mắt ra mà nhìn, nhập cho đủ vào!',
        ]);

        // ✅ Xử lý upload ảnh
        
        if ($request->hasFile('image')) {
            // Lưu ảnh vào storage/app/public/images
            $imagePath = $request->file('image')->store('images', 'public');
        }
// dd($request->file('image'));

        // ✅ Tạo bài viết
        Post::create([
            'user_id'       => auth()->id(), // nếu có user đăng nhập
            'category_id'   => $request->category_id,
            'title'         => $request->title,
            'slug'          => $request->slug ?? Str::slug($request->title),
            'excerpt'       => $request->excerpt,
            'content'       => $request->content,
            'image'         => $imagePath, // chỉ lưu đường dẫn ảnh
            'views'         => 0,
            'is_published'  => $request->has('is_published') ? 1 : 0,
            'published_at'  => $request->published_at ?? now(),
        ]);

        // ✅ Điều hướng + thông báo
        return redirect()->route('admin.post')
                         ->with('success', 'Thêm bài viết thành công!');
    }

    public function edit($id) {
        $posts = Post::find($id);
        return view ('admin.posts.edit', compact('posts'));
    }

  public function update(Request $request, $id)
{
    $post = Post::findOrFail($id);

    // ✅ Sửa lỗi chính tả 'tile' → 'title'
    $request->validate([
        'title' => 'required',
    ], [
        'title.required' => 'Không được để trống',
    ]);

    // ✅ Giữ nguyên đường dẫn ảnh cũ nếu không upload mới
    $imagePath = $post->image;

    // ✅ Nếu có upload ảnh mới
    if ($request->hasFile('image')) {
        // Xóa ảnh cũ nếu tồn tại
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        // Lưu ảnh mới
        $imagePath = $request->file('image')->store('images', 'public');
    }

    // ✅ Cập nhật dữ liệu bài viết
    $post->update([
        'user_id'       => auth()->id(),
        'category_id'   => $request->category_id,
        'title'         => $request->title,
        'slug'          => $request->slug ?? Str::slug($request->title),
        'excerpt'       => $request->excerpt,
        'content'       => $request->content,
        'image'         => $imagePath,
        'views'         => $post->views ?? 0, // giữ nguyên nếu không reset
        'is_published'  => $request->has('is_published') ? 1 : 0,
        'published_at'  => $request->published_at ?? now(),
    ]);

    return redirect()->back()->with('success', 'Cập nhật bài viết thành công!');
}

    public function delete ($id) {
        $posts = Post::findOrfail($id);


        // Xóa ảnh
        if($posts->image && Storage::disk('public')->exists($posts->image)) {
            Storage::disk('public')->delete($posts->image);
        }

        // Xóa
        $posts->delete();
        return redirect()->back();
    }
}
