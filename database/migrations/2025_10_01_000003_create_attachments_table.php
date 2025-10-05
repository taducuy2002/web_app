<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::create('attachments', function (Blueprint $table) {
			$table->id();
			$table->foreignId('post_id')->constrained()->cascadeOnDelete();
			$table->string('file_name');
			$table->string('file_path');
			$table->string('mime_type')->nullable();
			$table->unsignedBigInteger('file_size')->default(0);
			$table->unsignedInteger('download_count')->default(0);
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('attachments');
	}
};



