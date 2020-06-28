@foreach ($posts as $post)

        @if($post->category_id == 1)

    <article class="blog-entry-travel animate-box">
        <div class="blog-img" style="background-image: url({{asset('storage/'.$post->image)}});"></div>
        <div class="desc">
            <p class="meta">
                <span class="cat"><a href="{{ $post->id }}">{{ $post->category }}</a></span>
                <span class="date">{{date('M d, Y', strtotime($post->created_at))}}</span>
                <span class="pos">By <a href="#">{{ $post->user->name }}</a></span>
            </p>
            <h2><a href="travel/{{ $post->id }}">{{ $post->title }}</a></h2>
            <p>{!! $post->body !!}</p>

            <p><a href="travel/{{ $post->id }}" class="btn btn-primary with-arrow">Read More <i class="icon-arrow-right22"></i></a></p>

        </div>
    </article>

    @endif

@endforeach

<nav aria-label="Page navigation example">
    {{ $posts->links() }}
</nav>
