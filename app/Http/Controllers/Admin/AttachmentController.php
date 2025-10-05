<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
	public function store(Request $request, Post $post): RedirectResponse
	{
		$data = $request->validate([
			'file' => ['required', 'file', 'max:51200'],
		]);
		$uploaded = $request->file('file');
		$path = $uploaded->store('attachments/' . $post->id, 'public');
		Attachment::create([
			'post_id' => $post->id,
			'file_name' => $uploaded->getClientOriginalName(),
			'file_path' => $path,
			'mime_type' => $uploaded->getMimeType(),
			'file_size' => $uploaded->getSize(),
		]);
		return back();
	}

	public function destroy(Attachment $attachment): RedirectResponse
	{
		Storage::disk('public')->delete($attachment->file_path);
		$attachment->delete();
		return back();
	}
}



