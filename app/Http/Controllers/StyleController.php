<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::orderby('created_at', 'DESC')->get();
        //dd($posts[0]->user->name);


        $categories = Category::categoryAll();
        $posts = Post::orderby('created_at', 'DESC')->paginate(5);



        return view('style.style', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validatedData = $request->validate([
            'title' => 'required|unique:posts|min:5|max:255',
            'category' => 'required|min:4|max:10',
            'body' => 'required|min:5|max:255',
            'image' => 'image|mimes:jpeg,jpg,png,gif|required'
        ]);

        Post::create([
            'title' => $request->title,
            'category' => 'travel',
            'category_id' => 1,
            'body' => $request->body,
            'image' => $request->file('image')->store('uploads', 'public'),
            'author_id' => Auth::user()->id]);

        return redirect('/travel');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, $slug)
    {

        if (is_numeric($slug)) {
            // Get post for slug.
            $post = Post::findOrFail($slug);

            return Redirect::to(route('travel.show', $post->slug), 301);
        }

        // Get post for slug.
        $post = Post::whereSlug($slug)->firstOrFail();

        return view('style.single-travel', ['post' => $post]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $style)
    {
        return view('style.style-edit', ['style' => $style]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $style)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:posts|min:5|max:255',
            'type' => 'required|min:4|max:10',
            'body' => 'required|min:5|max:255',
            'image' => 'image|mimes:jpeg,jpg,png,gif|required'
        ]);

        //$post = Post::find($id);
        if($style && ($style->author_id == Auth::user()->id || Auth::user()->id == 1)) {
            $style->title = $request->title;
            $style->body = $request->body;
            $style->image = $request->file('image');
            $style->save();
            $data['message'] = 'Пост успешно изменен';
        }
        else
        {
            $data['errors'] = 'Неправильная операция. У вас нет достаточных прав';
        }

        return redirect('/style/'.$style->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
