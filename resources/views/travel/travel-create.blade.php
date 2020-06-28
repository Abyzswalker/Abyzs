@extends('layouts.layout')

@section('sidebar')
@endsection

@section('content')

    <main id="main" xmlns="http://www.w3.org/1999/html">
        ​

        ​
        <!-- ======= Blog Section ======= -->
        <section class="blog" data-aos="fade-up" data-aos-easing="ease-in-out" data-aos-duration="500">
            <div class="container">
                <div class="reply-form">
                    <h4>Edit Post</h4>
                    <form action="{{route('travel.store')}}" method="post", enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col form-group">
                                <input name="title" value="{{ old('title') }}" type="text" class="form-control @error('title') border-danger @enderror" placeholder="title">
                                @error('title')
                                <div class="text-danger my-2" role="alert">{{ $errors->first('title') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <input name="category" value="{{ old('category') }}" type="text" class="form-control @error('category') border-danger @enderror" placeholder="category">
                                @error('category')
                                <div class="text-danger my-2" role="alert">{{ $errors->first('category') }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col form-group">
                                <textarea name="body"  class="form-control @error('body') border-danger @enderror" placeholder="body">{{ old('body') }}</textarea>
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
