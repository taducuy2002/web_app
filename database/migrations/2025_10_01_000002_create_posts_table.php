<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('posts', function (Blueprint $table) {
			$table->id();
			$table->foreignId('user_id')->constrained()->cascadeOnDelete();
			$table->foreignId('category_id')->nullable()->constrained()->nullOnDelete();
			$table->string('title');
			$table->string('slug')->unique();
			$table->text('excerpt')->nullable();
			$table->longText('content')->nullable();
			$table->unsignedBigInteger('views')->default(0);
			$table->boolean('is_published')->default(true);
			$table->timestamp('published_at')->nullable()->index();
			$table->timestamps();
			$table->index(['category_id', 'is_published']);
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('posts');
	}
};



