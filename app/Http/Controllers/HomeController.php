<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $publishedPosts = Post::published()->count();
        $unPublishedPosts = Post::unPublished()->count();
        $users = User::count();
        $categories = Category::count();
        return view('home', compact('publishedPosts', 'unPublishedPosts', 'users', 'categories'));
    }
}
