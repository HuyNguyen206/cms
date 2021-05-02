<?php

use App\Category;
use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = Category::all();
        foreach ($categories as $cat){
            $cat->posts()->saveMany(factory(Post::class, 2)->create());
        }
        $posts = Post::all();
        foreach ($posts as $post){
            $post->tags()->attach(random_int(1, 3));
        }
    }
}
