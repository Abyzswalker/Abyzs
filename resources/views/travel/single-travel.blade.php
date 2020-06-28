@extends('layouts.layout')

@section('sidebar')
    @parent
    <div class="sidebar-module">
        <h4>About</h4>
        <p>
            About about
        </p>
    </div>
@endsection

@section('content')

   <div id="colorlib-main">
        <div class="colorlib-blog">
            <div class="container-wrap">
                <div class="row">
                    <div class="col-md-9">
                        <div class="content-wrap">
                            <article class="animate-box">
                                <div class="blog-img" style="background-image: url({{asset('storage/'.$post->image)}});"></div>
                                <div class="desc">
                                    <div class="meta">
                                        <p>
                                            <span>{{ $post->category }}</span>
                                            <span>{{date('M d, Y', strtotime($post->created_at))}}</span>
                                            <span>{{ $post->user->name }}</span>
                                            <span><a href="#">{{ count($post->comments) . ' отзыв'}}</a></span>
                                        </p>
                                    </div>
                                    <h2><a href="single.html">{{ $post->title }}</a></h2>
                                    {!! $post->body !!}
                                </div>
                            </article>

                            @auth
                                @if  ($post->author_id == Auth::user()->id || Auth::user()->id == 1)
                            <div class="float-right">
                                <a type="button" class="btn btn-warning" href="{{ route('travel.edit', $post->id) }}">Edit post</a>
                            </div>
                                @endif
                            @endauth

                            @auth
                                @if  ($post->author_id == Auth::user()->id || Auth::user()->id == 1)
                            <div class="float-right">
                                <form action="{{ route('travel.destroy', $post->id)}}"  method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                                @endif
                            @endauth



                            <div class="blog-comments">
                                ​
                                @foreach($post->comments as $comment)
                                <!--<h4 class="comments-count">8 Comments</h4>-->
                                ​
                                <div id="comment-1" class="comment clearfix">
                                    <!--<img src="assets/img/comments-1.jpg" class="comment-img  float-left" alt="">-->
                                    <h5><a href="">{{ $comment->user->name }}</a> <a href="#" class="reply"><i class="icofont-reply"></i></a></h5>
                                    <time datetime="2020-01-01">{{ $comment->created_at->diffForHumans() }}</time>
                                    <p>
                                        {{ $comment->body }}
                                    </p>
                                    @auth
                                        @if  ($comment->user->id == Auth::user()->id || Auth::user()->id == 1)
                                            <div class="float-right">
                                                <a type="button" class="btn btn-warning" href="">Edit comment</a>
                                            </div>
                                        @endif
                                    @endauth
                                </div><!-- End comment #1 -->
                                ​@endforeach


                                @guest
                                    <hr>
                                    <text> Авторизируйтесь что бы оставить комментарий </text>
                                @else
                                <div class="reply-form">
                                    <h4>Leave a Reply</h4>
                                    <form method="POST" action="/posts/{{ $post->id }}/comments">
                                        @csrf
                                        <div class="row">
                                            <div class="col form-group">
                                                <textarea name="body" class="form-control" placeholder="Your Comment*"></textarea>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Post Comment</button>
                                    </form>
                                </div>
                                @endguest
                            </div><!-- End blog comments -->


                        </div>
                    </div>
                    <div class="col-md-3 sticky-parent">
                        <div class="sidebar" id="sticky_item">
                            <div class="side animate-box">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" placeholder="Enter to search...">
                                    <button type="submit" class="btn submit btn-primary"><i class="icon-search3"></i></button>
                                </div>
                            </div>
                            <div class="side animate-box">
                                <h2 class="sidebar-heading">Categories</h2>
                                <p>
                                <ul class="category">
                                    <li><a href="#"><i class="icon-check"></i> Home</a></li>
                                    <li><a href="#"><i class="icon-check"></i> About Me</a></li>
                                    <li><a href="#"><i class="icon-check"></i> Blog</a></li>
                                    <li><a href="#"><i class="icon-check"></i> Travel</a></li>
                                    <li><a href="#"><i class="icon-check"></i> Lifestyle</a></li>
                                    <li><a href="#"><i class="icon-check"></i> Fashion</a></li>
                                    <li><a href="#"><i class="icon-check"></i> Health</a></li>
                                </ul>
                                </p>
                            </div>
                            <div class="side animate-box">
                                <h2 class="sidebar-heading">Recent Blog</h2>
                                <div class="f-blog">
                                    <a href="blog.html" class="blog-img" style="background-image: url(images/blog-1.jpg);">
                                    </a>
                                    <div class="desc">
                                        <h3><a href="blog.html">Be a designer</a></h3>
                                        <p class="admin"><span>25 March 2018</span></p>
                                    </div>
                                </div>
                                <div class="f-blog">
                                    <a href="blog.html" class="blog-img" style="background-image: url(images/blog-2.jpg);">
                                    </a>
                                    <div class="desc">
                                        <h3><a href="blog.html">How to build website</a></h3>
                                        <p class="admin"><span>24 March 2018</span></p>
                                    </div>
                                </div>
                                <div class="f-blog">
                                    <a href="blog.html" class="blog-img" style="background-image: url(images/blog-3.jpg);">
                                    </a>
                                    <div class="desc">
                                        <h3><a href="blog.html">Create website</a></h3>
                                        <p class="admin"><span>23 March 2018</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="side animate-box">
                                <h2 class="sidebar-heading">Instagram</h2>
                                <div class="instagram-entry">
                                    <a href="#" class="instagram text-center" style="background-image: url(images/gallery-1.jpg);">
                                    </a>
                                    <a href="#" class="instagram text-center" style="background-image: url(images/gallery-2.jpg);">
                                    </a>
                                    <a href="#" class="instagram text-center" style="background-image: url(images/gallery-3.jpg);">
                                    </a>
                                    <a href="#" class="instagram text-center" style="background-image: url(images/gallery-4.jpg);">
                                    </a>
                                    <a href="#" class="instagram text-center" style="background-image: url(images/gallery-5.jpg);">
                                    </a>
                                    <a href="#" class="instagram text-center" style="background-image: url(images/gallery-6.jpg);">
                                    </a>
                                    <a href="#" class="instagram text-center" style="background-image: url(images/gallery-7.jpg);">
                                    </a>
                                    <a href="#" class="instagram text-center" style="background-image: url(images/gallery-8.jpg);">
                                    </a>
                                </div>
                            </div>
                            <div class="side animate-box">
                                <div class="form-group">
                                    <input type="text" class="form-control form-email text-center" id="email" placeholder="Enter your email">
                                    <button type="submit" class="btn btn-primary btn-subscribe">Subscribe</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>
@stop

