<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();
        Category::factory(10)->create();
        $tags = Tag::factory(15)->create();
        $posts = Post::factory(30)->create();

        foreach ($posts as $post) {
            $tagIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagIds);
        }

        Comment::factory(150)->create();

        $this->call([AdminUserSeeder::class, SystemCategorySeeder::class]);
    }
}
