@extends('layouts.layout')


@section('content')

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>


        <div id="colorlib-main">

            <div class="colorlib-blog">

                <div class="container-wrap">
                    <div class="row row-bottom-padded-md">
                            @foreach ($posts as $post)
                            @if($post->category == 'Travel')
                            <div class="col-md-4">
                            <div class="blog-entry-style animate-box">
                                <div class="blog-img">
                                    <div class="blog-img" style="background-image: url({{asset('storage/'.$post->image)}});"></div>
                                </div>
                                <div class="desc">
                                    <p class="meta">
                                        <span class="cat"><a href="style/{{ $post->id }}">{{ $post->category }}</a></span>
                                        <span class="date">{{date('M d, Y', strtotime($post->created_at))}}</span>
                                        <span class="pos">By <a href="#">{{ $post->user->name }}</a></span>
                                    </p>
                                    <h2><a href="blog.html">{{ $post->title }}</a></h2>
                                    <p>{{ $post->body }}</p>
                                </div>
                            </div>
                        </div>
                                @endif
                            @endforeach

                    </div>



                    <div class="row">
                        <div class="col-md-12 animate-box" data-animate-effect="fadeInLeft">
                            <ul class="pagination">
                                <ul class="pagination">
                                    {{ $posts->links() }}
                                </ul>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

@stop



