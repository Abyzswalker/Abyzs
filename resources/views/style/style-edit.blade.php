@extends('layouts.layout')

@section('sidebar')
@endsection

@section('content')

    <main id="main">
        ​
        <!-- ======= Blog Section ======= -->
        <section class="breadcrumbs">
            <div class="container">
                ​
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Blog</h2>
                    ​
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li>Dolorum optio tempore voluptas dignissimos cumque fuga qui quibusdam quia reiciendis</li>
                    </ol>
                </div>
                ​
            </div>
        </section><!-- End Blog Section -->
        ​
        <!-- ======= Blog Section ======= -->
        <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">
                ​<div class="reply-form">
                    <h4>Edit Post</h4>

                    <form action="{{ route('style.update', $style->id) }}" method="post">

                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col form-group">
                                <input name="title" value="{{ $style->title }}" type="text" class="form-control" placeholder="title">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <textarea name="body" class="form-control" placeholder="Post text">{{ $style->body }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>
            </div><!-- End blog comments -->
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@stop
