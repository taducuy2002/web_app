<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ThemeAssetController extends Controller
{
	public function __invoke(string $path): Response|BinaryFileResponse
	{
		$base = resource_path('views/vipcorel.com');
		$full = realpath($base . DIRECTORY_SEPARATOR . $path);
		if (!$full || !str_starts_with($full, $base) || !File::exists($full)) {
			abort(404);
		}
		$mime = File::mimeType($full) ?: 'application/octet-stream';
		return response()->file($full, ['Content-Type' => $mime]);
	}
}



