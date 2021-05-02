<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $guarded = [];

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

}
