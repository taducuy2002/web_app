<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
	use HasFactory;

	protected $fillable = [
		'user_id',
		'category_id',
		'title',
		'slug',
		'excerpt',
		'content',
		'views',
		'is_published',
		'published_at',
	];

	protected $casts = [
		'is_published' => 'boolean',
		'published_at' => 'datetime',
	];

	public function author(): BelongsTo
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	public function attachments(): HasMany
	{
		return $this->hasMany(Attachment::class);
	}

	public function comments(): HasMany
	{
		return $this->hasMany(Comment::class);
	}
}



