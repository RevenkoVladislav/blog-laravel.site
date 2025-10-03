@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Лента</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                            <div class="blog-post-thumbnail-wrapper">
                                <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="blog-post-category">{{ $post->category->title }}</p>
                            </div>
                            <div class="d-flex justify-content-between">
                            <a href="{{ route('post.show', $post) }}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $post->title }}</h6>
                            </a>
                            @auth()
                                <span class="blog-post-title">{{ $post->comments_count }} • <i class="far fa-comment"></i></span>
                                <form action="{{ route('post.like.store', $post) }}" method="POST">
                                    @csrf
                                    <span class="blog-post-title">{{ $post->liked_users_count }}</span>
                                    <button type="submit" class="border-0 bg-transparent">
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="fas fa-heart"></i>
                                        @else
                                            <i class="far fa-heart"></i>
                                        @endif
                                    </button>
                                </form>
                            @endauth
                                @guest
                                    <span class="blog-post-title">{{ $post->comments_count }} • <i class="far fa-comment"></i></span>
                                    <span class="blog-post-title">{{ $post->liked_users_count }} <i class="far fa-heart"></i></span>
                                @endguest
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -80px;">
                        {{ $posts->links() }}
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-md-8">
                    <h5 class="text-center" data-aos="fade-up">Рандомные посты</h5>
                    <section>
                        <div class="row blog-post-row">
                            @foreach($randomPosts as $post)
                                <div class="col-md-6 blog-post" data-aos="fade-up">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                                    </div>
                                    <p class="blog-post-category">{{ $post->category->title }}</p>
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('post.show', $post) }}" class="blog-post-permalink">
                                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                                        </a>
                                        @auth()
                                            <span class="blog-post-title">{{ $post->comments_count }} • <i class="far fa-comment"></i></span>
                                            <form action="{{ route('post.like.store', $post) }}" method="POST">
                                                @csrf
                                                <span class="blog-post-title">{{ $post->liked_users_count }}</span>
                                                <button type="submit" class="border-0 bg-transparent">
                                                    @if(auth()->user()->likedPosts->contains($post->id))
                                                        <i class="fas fa-heart"></i>
                                                    @else
                                                        <i class="far fa-heart"></i>
                                                    @endif
                                                </button>
                                            </form>
                                        @endauth
                                        @guest
                                            <span class="blog-post-title">{{ $post->comments_count }} • <i class="far fa-comment"></i></span>
                                            <span class="blog-post-title">{{ $post->liked_users_count }} <i class="far fa-heart"></i></span>
                                        @endguest
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </section>
                </div>

                <div class="col-md-4 sidebar" data-aos="fade-left">
                    <div class="widget widget-post-list">
                        <h5 class="widget-title">Популярные посты</h5>
                        <ul class="post-list">
                            @foreach($likedPosts as $post)
                                <li class="post">
                                    <a href="{{ route('post.show', $post) }}" class="post-permalink media">
                                        <img src="{{ 'storage/' . $post->preview_image }}" alt="blog post">
                                        <div class="media-body">
                                            <h6 class="post-title">{{ $post->title }}</h6>

                                            <div class="d-flex justify-content-between">
                                                @auth()
                                                    <form action="{{ route('post.like.store', $post) }}" method="POST">
                                                        @csrf
                                                        <span class="blog-post-title">{{ $post->liked_users_count }}</span>
                                                        <button type="submit" class="border-0 bg-transparent">
                                                            @if(auth()->user()->likedPosts->contains($post->id))
                                                                <i class="fas fa-heart"></i>
                                                            @else
                                                                <i class="far fa-heart"></i>
                                                            @endif
                                                        </button>
                                                    </form>
                                                    <span class="blog-post-title">{{ $post->comments_count }} • <i class="far fa-comment"></i></span>
                                                @endauth
                                                    @guest
                                                        <span class="blog-post-title">{{ $post->comments_count }} • <i class="far fa-comment"></i></span>
                                                        <span class="blog-post-title">{{ $post->liked_users_count }} <i class="far fa-heart"></i></span>
                                                    @endguest
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
