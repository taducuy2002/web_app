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

    public function update(Request $request,  $id) {
        $posts_update = Post::findOrFail($id);
        $request -> validate([
            'title' => 'required',
        ],
        
        [
            'tile.required' => 'Không được để chống'
        ]);

        // Up ảnh mới
        if($request->hasFile('image')) {
            // xóa ảnh cũ
            if($posts_update->image && Storage::disk('public')->exists($posts_update->image)) {
                Storage::disk('public')->delete($posts_update->image);
            }

            // Lưu ảnh mới
            $imagePath = $request->file('image')->store('images', 'public');

            $posts_update->image = $imagePath;
        }

        
        $posts_update->update([
           'title' => $request->title
        ]);
        return redirect()->back();
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
