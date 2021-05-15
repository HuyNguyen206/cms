<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use App\Tag;
use Illuminate\Http\Request;
use Newsletter;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $posts = $this->getPostPagination(new Post());
        $latestPosts = Post::latest();
        if (\request()->query('search')) {
            return view('frontend.search', compact('posts'));
        }
        return view('welcome', compact('posts'))->withTitle(Setting::firstOrFail()->site_name)
            ->withFirstPost($latestPosts->first())
            ->withSecondPost($latestPosts->skip(1)->take(1)->first())
            ->withThirdPost($latestPosts->skip(2)->take(1)->first())
            ->withLatestCategories(Category::whereHas('posts')->latest()->take(3)->get());
    }

    public function viewPost(Post $post)
    {
        $categoryId = $post->category->id;
        return view('frontend.post-detail', compact('post', 'categoryId'));
    }

    public function viewPostOfCategory(Category $category)
    {
        $posts = $this->getPostPagination($category->posts());
        $tags = Tag::latest()->take(5)->get();
        return view('frontend.category', compact('category', 'posts', 'tags'))->withCategoryId($category->id);
    }

    public function viewPostOfTag(Tag $tag)
    {
        $posts = $this->getPostPagination($tag->posts());
        $tags = Tag::latest()->take(5)->get();
        return view('frontend.tag', compact('tag', 'posts', 'tags'));
    }

    public function getPostPagination($posts, $paginateNumber = 2)
    {
//        return $posts->searchPosts()->paginate($paginateNumber);
        $search = \request()->query('search');
        if ($search) {
            $posts = $posts->published()->where('title', 'like', "%$search%")->paginate($paginateNumber);
        } else {
            $posts = $posts->published()->paginate($paginateNumber);
        }
        return $posts;
    }

    public function subscribe()
    {
        try {
            Newsletter::subscribe(request()->email);
        } catch (\Throwable $ex) {
            return back()->withError($ex->getMessage());
        }
        return redirect()->back()->withSuccess('Subscribe successfully!');
    }

}
