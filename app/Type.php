<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function post(){

        return $this->hasMany(Post::class, 'category_id');

    }

    public static function categoryAll()
    {
        return Category::get();
    }
}
