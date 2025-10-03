@extends('layouts.main')

@section('content')
    <!-- ЗАГОТОВКА СТРАНИЦЫ ПОД ГЛАВНУЮ -->
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категории</h1>
            <section class="featured-posts-section">
                <ul>
                    @foreach($categories as $category)
                    <li class="blog-post-category">
                        <a href="{{ route('category.post.index', $category) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $category->title }}</h6>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </section>
        </div>

    </main>
@endsection
