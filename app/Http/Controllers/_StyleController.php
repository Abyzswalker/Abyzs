<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class StyleController extends Controller
{
    public function index(){


        //$posts = Post::orderby('created_at', 'DESC')->get();
        //dd($posts[0]->user->name);

        /*$posts = Post::orderby('created_at', 'DESC')->get();
         dd($posts[0]->user->name); */

        $posts = Post::orderby('created_at', 'DESC')->paginate(2);
        /*dd($posts);*/

        //$posts = Post::orderby('created_at', 'DESC')->get();
         //dd($posts);






        return view('style', ['posts' => $posts]);
    }
}
