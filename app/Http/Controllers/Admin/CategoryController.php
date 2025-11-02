<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
	public function index(): View
	{
		$categories = Category::whereNull('paren_id')->get();
		return view('admin.category.index', compact('categories'));
	}

	public function create(): View
	{
		 $categories = Category::whereNull('paren_id')->get();
		return view('admin.category.create', compact('categories'));
	}

	public function store(Request $request): RedirectResponse
	{
		$data = $request->validate([
			'name' => ['required', 'string', 'max:255'],
			
		]);

		Category::create([
			'name' => $request->name,
			'paren_id' => $request->paren_id,
		]);
		return redirect()->route('cate.index');
	}

	public function edit($id)
{
    $category = Category::findOrFail($id); // danh mục cần sửa
    $categories = Category::whereNull('paren_id')->where('id', '!=', $id)->get(); // danh sách danh mục cha, loại bỏ chính nó
    return view('admin.category.edit', compact('category', 'categories'));
}


	public function update(Request $request, $id)
	{
		$data = Category::findOrFail($id);
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			
		]);

		$data->update([
			'name' => $request->name,
			'paren_id' => $request->paren_id,
		]);
		return redirect()->route('cate.index');
	}

	public function delete($id)
	{
		$category = Category::findOrFail($id);
		$category->delete();
		return back();
	}
}



