<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::factory(30)->create();

        Post::create(['title' => 'My First post', 'content' => 'Content for my first post']);
        Post::create(['title' => 'My Second post', 'content' => 'Content for my second post']);
        Post::create(['title' => 'My Third post', 'content' => 'Content for my third post']);
        Post::create(['title' => 'My Fourth post', 'content' => 'Content for my fourth post']);

        Comment::create(['post_id' => 1, 'username' => 'Andre M', 'content' => 'A comment for post id 1']);
        Comment::create(['post_id' => 1, 'username' => 'Jeffrey W', 'content' => 'Another comment for the post with an id of 1']);
        Comment::create(['post_id' => 1, 'username' => 'Taylor O', 'content' => 'Yet another comment for post id 1']);
        Comment::create(['post_id' => 2, 'username' => 'John S', 'content' => 'A comment for post id 2']);
        Comment::create(['post_id' => 2, 'username' => 'Martin F', 'content' => 'Another comment for the post with an id of 2']);
        Comment::create(['post_id' => 3, 'username' => 'Robert F', 'content' => 'A comment for post id 3']);
        Comment::create(['post_id' => 3, 'username' => 'Jennifer D', 'content' => 'Another comment for the post with an id of 3']);
        Comment::create(['post_id' => 4, 'username' => 'Anne F', 'content' => 'A comment for post id 4']);
        Comment::create(['post_id' => 4, 'username' => 'Diane S', 'content' => 'Another comment for the post with an id of 4']);
    }
}
