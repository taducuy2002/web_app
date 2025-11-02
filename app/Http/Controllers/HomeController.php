<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::with('children')->whereNull('paren_id')->get();

        $latestPosts = Post::query()
            ->where('is_published', true)
            ->latest('published_at')
            ->take(8)
            ->get();

        // Get statistics
        $stats = [
            'topics' => Post::where('is_published', true)->count(),
            'posts' => Post::where('is_published', true)->count(),
            'members' => User::count(),
        ];

        // Get newest member
        $newestMember = User::latest()->first();

        // Get newest members for sidebar
        $newestMembers = User::where('created_at', '>=', Carbon::now()->subDays(2))->get();

        $breadcrumbs = [
            ['label' => 'Trang chủ'],
        ];
        $posts = Post::query()->paginate(8);
         // Bài viết mới nhất
        $posts_create_at = Post::orderBy('created_at', 'desc')->take(10)->get();
        // bài viết ngẫu nhiên
         $posts_random = Post::inRandomOrder()->take(10)->get();
        return view('webapp.web.home', compact('posts','categories', 'latestPosts', 'stats', 'newestMember', 'newestMembers', 'breadcrumbs','posts_create_at','posts_random'));
    }

    // Bài viết mới
    public function getPost() {
        $posts = Post::orderBy('create_at', 'desc')->take(10)->get();
        return view('client.Home.home', compact('posts'));
    }
 
    // Hiện ngẫu nhiên
      public function p() {
        $posts = Post::orderBy('create_at', 'desc')->take(10)->get();
        return view('client.Home.home', compact('posts'));
    }
    // public function detail(){
    // return view('client.Home.Detail');
    // }


    // Danh mục
   public function showCategories()
{
    $categories = Category::with('children')->whereNull('paren_id')->get();
    return view('webapp.web.home', compact('categories'));
}

public function postCategory($id)
{
    // Danh mục hiện tại (được chọn)
    $category = Category::with('children.children')->findOrFail($id);

    // Danh sách menu: các danh mục gốc (dùng cho dropdown/menu ở detail)
    $categories = Category::with('children.children')->whereNull('paren_id')->get();

    // ✅ Lấy tất cả ID danh mục con (bao gồm chính danh mục hiện tại)
    $allCategoryIds = $this->getAllCategoryIds($category);

    // ✅ Lọc bài viết theo danh mục (và cả danh mục con)
    $posts = \App\Models\Post::whereIn('category_id', $allCategoryIds)
        ->orderBy('created_at', 'desc')
        ->paginate(12);

    return view('webapp.web.detail', compact('category', 'categories', 'posts'));
}

/**
 * Hàm đệ quy lấy toàn bộ ID danh mục con (bao gồm cả chính nó)
 */
private function getAllCategoryIds($category)
{
    $ids = [$category->id];

    foreach ($category->children as $child) {
        $ids = array_merge($ids, $this->getAllCategoryIds($child));
    }

    return $ids;
}

/// Tìm kiếm
public function search(Request $request): View
{
    $categories = Category::with('children')->whereNull('paren_id')->get();
    $q = trim((string) $request->query('q', ''));

    $posts = Post::query()
        ->when($q !== '', function ($query) use ($q) {
            $query->where(function ($sub) use ($q) {
                $sub->where('title', 'like', "%$q%")
                    ->orWhere('excerpt', 'like', "%$q%")
                    ->orWhere('content', 'like', "%$q%");
            });
        })
        ->where('is_published', true)
        ->latest('published_at')
        ->paginate(12)
        ->appends(['q' => $q]);

    return view('webapp.web.search', [
        'posts' => $posts,
        'pageTitle' => $q ? "Kết quả tìm kiếm cho: $q" : 'Tất cả bài viết',
        'categories'=> $categories,
    ]);
}


// Mua vip
public function vip() {
     $categories = Category::with('children')->whereNull('paren_id')->get();
      $post = Post::all();
   return view('webapp.web.muavip', compact('categories','post'));
}
}

