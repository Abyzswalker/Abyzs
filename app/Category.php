<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function post(){

        return $this->hasMany(Post::class);

    }

    public static function categoryAll()
    {
        return Category::get();
    }

}
