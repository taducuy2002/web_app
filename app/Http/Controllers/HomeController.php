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
        return view('client.home.home', compact('posts','categories', 'latestPosts', 'stats', 'newestMember', 'newestMembers', 'breadcrumbs'));
    }

    public function detail(){
    return view('client.Home.Detail');
    }
}

