<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    //


    public function store(Post $post){

        //$post->addComment();

        Comment::create([
            'body' => request('body'),
            'post_id' => $post->id,
            'user_id' => Auth::user()->id
        ]);



        return back();

        //dd($request->all());

    }


    public function edit(Post $post){

        return view('travel.comment-edit', ['post' => $post]);
    }


}
