@extends('layouts.main')

@section('content')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title mb-4" data-aos="fade-up">Тэги</h1>

            <div class="row">
                @foreach($tags as $tag)
                    <div class="col-md-3 col-sm-6 mb-4" data-aos="fade-up">
                        <a href="{{ route('tag.post.index', $tag) }}"
                           class="d-block text-decoration-none text-dark">
                            <div class="card shadow-sm h-100 border-0 text-center category-card">
                                <div class="card-body d-flex align-items-center justify-content-center">
                                    <h6 class="mb-0">{{ $tag->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
@endsection
