<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(){
//        dd(url()->current());
//        dd(\request()->route()->getName());
        $search = \request()->query('search');
        if($search){
            $posts = Post::where('title', 'like', "%$search%")->paginate(2);
        }
        else{
            $posts = Post::paginate(2);
        }
        return view('welcome', compact('posts'));
    }

    public function viewPost(Post $post){
        return view('frontend.post-detail', compact('post'));
    }

    public function viewPostOfCategory(Category $category){
//        $search = \request()->query('search');
//        if($search){
//            $posts = $category->posts()->where('title', 'like', "%$search%")->paginate(2);
//        }
//        else{
//            $posts = $category->posts()->paginate(2);
//        }
        $posts = $this->getPostPagination($category->posts());
        return view('frontend.category', compact('category', 'posts'));
    }
    public function viewPostOfTag(Tag $tag){
//        $search = \request()->query('search');
//        if($search){
//            $posts = $tag->posts()->where('title', 'like', "%$search%")->paginate(2);
//        }
//        else{
//            $posts = $tag->posts()->paginate(2);
//        }
       $posts = $this->getPostPagination($tag->posts());
        return view('frontend.tag', compact('tag', 'posts'));
    }

    public function getPostPagination($posts, $paginateNumber = 2){
//        return $posts->searchPosts()->paginate($paginateNumber);
        $search = \request()->query('search');
        if($search){
            $posts = $posts->where('title', 'like', "%$search%")->paginate($paginateNumber);
        }
        else{
            $posts = $posts->paginate($paginateNumber);
        }
        return $posts;
        }

}
