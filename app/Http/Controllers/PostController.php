<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoryCount')->only(['create', 'edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if(!Category::count() || !Tag::count()){
            return redirect()->back()->withError('You must have some categories and tags to create a post');
        }
        return view('posts.create')->withCategories(Category::all())->withTags(Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => '',
            'published_at' => '',
            'category_id' => 'required'

        ]);
        try {
            $image = $request->file('image');
            if ($image) {
//                if(!is_dir(public_path('storage/post-image'))){
//                    mkdir(public_path('storage/post-image'));
//                }
                $path = $image->store('post-image');
                $data['image_path'] = $path;
            }
            $data['slug'] = Str::slug($request->title);
            $data['user_id'] = auth()->id();
//            $post = auth()->user()->posts()->create($data);
            $post = Post::create($data);
            if($request->has('tag_id')){
                $post->tags()->attach($request->tag_id);
            }
            return redirect(route('posts.index'))->with('success', 'Create post successfull');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
        return view('posts.edit')->withPost($post)->withCategories(Category::all())->withTags(Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
            'published_at' => '',
            'category_id' => ''

        ]);
        try {
            $image = $request->file('image');
            if ($image) {
//                if(!is_dir(public_path('storage/post-image'))){
//                    mkdir(public_path('storage/post-image'));
//                }
                $post->deleteImage();
                $path = $image->store('post-image');
                $data['image_path'] = $path;
            }
            if($request->has('tag_id')){
                $post->tags()->sync($request->tag_id);
            }
            $data['slug'] = Str::slug($request->title);
            $post->update($data);
            return redirect(route('posts.index'))->with('success', 'Update post successfull');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
//        if ($post->image_path) {
//            if (file_exists(public_path('storage/' . $post->image_path)))
//                unlink(public_path('storage/' . $post->image_path));
//        }
        $post->delete();
        return redirect(route('posts.index'))->with('success', 'Delete successfully');
    }

    public function trashedPost()
    {
        $trashedPosts = Post::onlyTrashed()->get();
        return view('posts.trashed', ['posts' => $trashedPosts]);
    }

    public function forceDestroy($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->firstOrFail();
        if ($post->image_path) {
            $post->deleteImage();
//            if (file_exists(public_path('storage/' . $post->image_path)))
//                unlink(public_path('storage/' . $post->image_path));
        }
        $post->forceDelete();
        return view('posts.trashed', ['posts' => Post::onlyTrashed()->get()])->with('success', 'Force delete successfully');
    }

    public function restorePost($id)
    {
        Post::onlyTrashed()->where('id', $id)->restore();
        return view('posts.trashed', ['posts' => Post::onlyTrashed()->get()])->with('success', 'Restore successfully');
    }
}
