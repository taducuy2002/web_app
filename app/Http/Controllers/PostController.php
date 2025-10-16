<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
	public function index(): View
	{
		// $posts = Post::query()
		// 	->with(['category', 'author'])
		// 	->where('is_published', true)
		// 	->latest('published_at')
		// 	->paginate(12);
         
		$posts = Post::orderBy('create_at', 'desc')->limit(8)->get();
		

		// $categories = Category::query()->orderBy('name')->get();
		// $latestPosts = Post::query()->where('is_published', true)->latest('published_at')->take(8)->get();
		// $latestActivity = Post::query()->where('is_published', true)->latest('updated_at')->take(8)->get();
		// $topAuthors = \App\Models\User::query()
		// 	->withCount(['posts' => function($q){ $q->where('is_published', true); }])
		// 	->orderByDesc('posts_count')
		// 	->take(8)
		// 	->get();
		// $breadcrumbs = [
		// 	['label' => 'Trang chủ', 'url' => route('home')],
		// 	['label' => 'Bài viết mới nhất'],
		// ];

		// // Get statistics
		// $stats = [
		// 	'topics' => Post::where('is_published', true)->count(),
		// 	'posts' => Post::where('is_published', true)->count(),
		// 	'members' => \App\Models\User::count(),
		// ];

		// // Get newest member
		// $newestMember = \App\Models\User::latest()->first();

		return view('client.home.home', compact('posts'));
	}

	public function category(string $slug): View
	{
		$category = Category::query()->where('slug', $slug)->firstOrFail();
		$posts = Post::query()
			->with(['category', 'author'])
			->where('is_published', true)
			->where('category_id', $category->id)
			->latest('published_at')
			->paginate(12);

		$categories = Category::query()->orderBy('name')->get();
		$latestPosts = Post::query()->where('is_published', true)->latest('published_at')->take(8)->get();
		$latestActivity = Post::query()->where('is_published', true)->latest('updated_at')->take(8)->get();
		$topAuthors = \App\Models\User::query()
			->withCount(['posts' => function($q){ $q->where('is_published', true); }])
			->orderByDesc('posts_count')
			->take(8)
			->get();
		$breadcrumbs = [
			['label' => 'Trang chủ', 'url' => route('home')],
			['label' => $category->name],
		];

		// Get statistics
		$stats = [
			'topics' => Post::where('is_published', true)->count(),
			'posts' => Post::where('is_published', true)->count(),
			'members' => \App\Models\User::count(),
		];

		// Get newest member
		$newestMember = \App\Models\User::latest()->first();

		return view('posts.index', compact('posts', 'categories', 'category', 'latestPosts', 'latestActivity', 'topAuthors', 'breadcrumbs', 'stats', 'newestMember'));
	}

	public function show(string $slug): View
	{
		$post = Post::query()
			->with(['category', 'author', 'attachments', 'comments.author'])
			->where('slug', $slug)
			->firstOrFail();

		$post->increment('views');

		$categories = Category::query()->orderBy('name')->get();
		$latestPosts = Post::query()->where('is_published', true)->latest('published_at')->take(8)->get();
		$latestActivity = Post::query()->where('is_published', true)->latest('updated_at')->take(8)->get();
		$topAuthors = \App\Models\User::query()
			->withCount(['posts' => function($q){ $q->where('is_published', true); }])
			->orderByDesc('posts_count')
			->take(8)
			->get();
		$breadcrumbs = [
			['label' => 'Trang chủ', 'url' => route('home')],
			['label' => $post->category?->name ?? 'Bài viết', 'url' => $post->category ? route('category.show', $post->category->slug) : null],
			['label' => $post->title],
		];

		// Get statistics
		$stats = [
			'topics' => Post::where('is_published', true)->count(),
			'posts' => Post::where('is_published', true)->count(),
			'members' => \App\Models\User::count(),
		];

		// Get newest member
		$newestMember = \App\Models\User::latest()->first();

		return view('posts.show', compact('post', 'categories', 'latestPosts', 'latestActivity', 'topAuthors', 'breadcrumbs', 'stats', 'newestMember'));
	}

	public function storeComment(Request $request, int $postId): RedirectResponse
	{
		$request->validate([
			'content' => ['required', 'string', 'min:2'],
		]);

		$post = Post::findOrFail($postId);
		Comment::create([
			'post_id' => $post->id,
			'user_id' => $request->user()?->id ?? auth()->id(),
			'content' => $request->string('content'),
		]);

		return back();
	}

	public function downloadAttachment(int $attachmentId)
	{
		$attachment = Attachment::findOrFail($attachmentId);
		$attachment->increment('download_count');
		return Storage::disk('public')->download($attachment->file_path, $attachment->file_name);
	}

	public function search(Request $request): View
	{
		$q = trim((string) $request->query('q', ''));
		$posts = Post::query()
			->with(['category', 'author'])
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

		$categories = Category::query()->orderBy('name')->get();
		$latestPosts = Post::query()->where('is_published', true)->latest('published_at')->take(8)->get();
		$latestActivity = Post::query()->where('is_published', true)->latest('updated_at')->take(8)->get();
		$topAuthors = \App\Models\User::query()
			->withCount(['posts' => function($q){ $q->where('is_published', true); }])
			->orderByDesc('posts_count')
			->take(8)
			->get();
		$breadcrumbs = [
			['label' => 'Trang chủ', 'url' => route('home')],
			['label' => 'Tìm kiếm'],
		];
		// Get statistics
		$stats = [
			'topics' => Post::where('is_published', true)->count(),
			'posts' => Post::where('is_published', true)->count(),
			'members' => \App\Models\User::count(),
		];

		// Get newest member
		$newestMember = \App\Models\User::latest()->first();

		return view('posts.index', [
			'posts' => $posts,
			'categories' => $categories,
			'category' => null,
			'pageTitle' => $q ? "Kết quả tìm kiếm cho: $q" : 'Tất cả bài viết',
			'latestPosts' => $latestPosts,
			'latestActivity' => $latestActivity,
			'topAuthors' => $topAuthors,
			'breadcrumbs' => $breadcrumbs,
			'stats' => $stats,
			'newestMember' => $newestMember,
		]);
	}

	// Thêm mới 
	public function form () {
		
	}
}


