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

                    <form action="{{ route('travel.update', $travel->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col form-group">
                                <input name="type" value="{{ $travel->category }}" type="text" class="form-control @error('category') border-danger @enderror" placeholder="category" disabled>
                                @error('category')
                                <div class="text-danger my-2" role="alert">{{ $errors->first('type') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <input name="title" value="{{ $travel->title }}" type="text" class="form-control @error('title') border-danger @enderror" placeholder="title">
                                @error('title')
                                <div class="text-danger my-2" role="alert">{{ $errors->first('title') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <textarea name="body"  class="form-control @error('body') border-danger @enderror" placeholder="body">{{ $travel->body }}</textarea>
                                @error('body')
                                <div class="text-danger my-2" role="alert">{{ $errors->first('body') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <input type="file", name="image">
                                @error('image')
                                <div class="text-danger my-2" role="alert">{{ $errors->first('image') }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div><!-- End blog comments -->
        </section><!-- End Blog Section -->

    </main><!-- End #main -->
@stop

