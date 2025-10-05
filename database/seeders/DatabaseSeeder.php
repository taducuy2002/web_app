<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\{User, Category, Post, Attachment};

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::query()->first() ?? User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
        ]);
        if (!$admin->is_admin) {
            $admin->is_admin = true;
            $admin->save();
        }

        $categories = collect([
            'Brushes', 'Mockups', 'Fonts', 'Templates', 'Vectors', 'Tutorials'
        ])->map(function ($name) {
            return Category::firstOrCreate([
                'slug' => Str::slug($name),
            ], [
                'name' => $name,
                'description' => null,
            ]);
        });

        foreach (range(1, 12) as $i) {
            $title = 'Demo bài viết ' . $i;
            $post = Post::firstOrCreate([
                'slug' => Str::slug($title),
            ], [
                'user_id' => $admin->id,
                'category_id' => $categories->random()->id,
                'title' => $title,
                'excerpt' => 'Mẫu mô tả ngắn cho bài viết ' . $i,
                'content' => '<p>Nội dung mẫu cho bài viết ' . $i . '</p>',
                'is_published' => true,
                'published_at' => now()->subDays(12 - $i),
            ]);

            Attachment::firstOrCreate([
                'post_id' => $post->id,
                'file_path' => 'demo/sample-' . $i . '.zip',
            ], [
                'file_name' => 'sample-' . $i . '.zip',
                'mime_type' => 'application/zip',
                'file_size' => 2048 * $i,
            ]);
        }

    }
}
