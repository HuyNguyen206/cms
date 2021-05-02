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
        $posts = $this->getPostPagination(new Post());
        return view('welcome', compact('posts'));
    }

    public function viewPost(Post $post){
        return view('frontend.post-detail', compact('post'));
    }

    public function viewPostOfCategory(Category $category){
        $posts = $this->getPostPagination($category->posts());
        return view('frontend.category', compact('category', 'posts'));
    }
    public function viewPostOfTag(Tag $tag){
       $posts = $this->getPostPagination($tag->posts());
        return view('frontend.tag', compact('tag', 'posts'));
    }

    public function getPostPagination($posts, $paginateNumber = 2){
//        return $posts->searchPosts()->paginate($paginateNumber);
        $search = \request()->query('search');
        if($search){
            $posts = $posts->published()->where('title', 'like', "%$search%")->paginate($paginateNumber);
        }
        else{
            $posts = $posts->published()->paginate($paginateNumber);
        }
        return $posts;
        }

}
