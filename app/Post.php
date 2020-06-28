<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    protected $guarded = [];
    //Many posts belongs to one user
    public function user() {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /*public static function latestPost()
    {
        return Post::orderBy('updated_at', 'desc')->where('status', 1)->limit(5)->get();
    }*/




    /*public function addComment(Request $request){

        Comment::create([
            'body' => $request->body,
            'post_id' => $this->id,
            'author_id' => Auth::user()->id
        ]);

    }*/

}
