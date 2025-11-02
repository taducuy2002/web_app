<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\DownloadLog;

class ImageController extends Controller
{
    public function download(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            return response()->json(['error' => 'Bạn chưa đăng nhập'], 401);
        }

        $relativePath = $request->image_relative_path;
        if (!$relativePath) {
            return response()->json(['error' => 'Thiếu đường dẫn ảnh'], 400);
        }

        // Kiểm tra file tồn tại
        $path = storage_path('app/public/' . $relativePath);
        if (!file_exists($path)) {
            return response()->json(['error' => 'File không tồn tại'], 404);
        }

        $remainingDownloads = null;

        // Giới hạn tải cho user thường
        if ($user->account_level === 'normal') {
            $downloadsIn24h = DownloadLog::where('user_id', $user->id)
                ->where('created_at', '>=', now()->subDay())
                ->count();

            $remainingDownloads = max(0, 1 - $downloadsIn24h);

            if ($downloadsIn24h >= 1) {
                return response()->json([
                    'error' => 'Bạn đã hết lượt tải hôm nay. Nâng cấp tài khoản VIP để tải không giới hạn!',
                    'remaining_downloads' => $remainingDownloads
                ], 403);
            }
        }

        // Ghi log tải xuống
        DownloadLog::create([
            'user_id' => $user->id,
            'image_path' => $relativePath,
        ]);

        if ($remainingDownloads !== null) {
            $remainingDownloads--; // Sau khi tải thành công
        }

        // Trả file kèm thông tin lượt còn lại (header custom)
        return response()->download($path)
            ->header('X-Remaining-Downloads', $remainingDownloads ?? '');
    }
}
