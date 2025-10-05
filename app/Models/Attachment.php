<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
	use HasFactory;

	protected $fillable = [
		'post_id',
		'file_name',
		'file_path',
		'mime_type',
		'file_size',
		'download_count',
	];

	public function post(): BelongsTo
	{
		return $this->belongsTo(Post::class);
	}
}



