<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];
    protected $dates = ['published_at'];

    public function deleteImage(){
        Storage::delete($this->image_path);
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    public function getPostParam(){
      return $this->slug.'-'.$this->id.'.html';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function scopeSearchPosts($query){
        $search = \request()->query('search');
        if($search){
            $posts = $query->where('title', 'like', "%$search%");
        }
        else{
            $posts = $query;
        }
      return $posts;
    }

    public function scopePublished($query){
       return $query->where('published_at', '<=', now());
    }
    public function scopeUnPublished($query){
       return $query->where('published_at', '>', now());
    }

    public function getImageAttribute(){
        return $this->image_path ? asset('storage/'.$this->image_path) : null ;
    }

//        protected static function booted()
//        {
//          static::addGlobalScope('published_at', function (Builder $builder){
//              $builder->where('published_at', '<=', now());
//          })
//        }

    public function nextPost(){
//            return Post::where('created_at', '<', $this->created_at)->latest()->first();
                return Post::where('id', '>', $this->id)->orderBy('id')->first();
    }

    public function previousPost(){
//            return Post::where('created_at', '>', $this->created_at)->oldest()->first();
        return Post::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }

}
