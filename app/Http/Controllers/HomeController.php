<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\View\View;
use Carbon\Carbon;


class HomeController extends Controller
{
    public function index(): View
    {
        $categories = Category::query()
            ->with(['posts' => function($query) {
                $query->where('is_published', true)->latest('published_at');
            }])
            ->orderBy('name')
            ->get();

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
    public function detail(){
    return view('client.Home.Detail');
    }
}

