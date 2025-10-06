@extends('admin.layouts.main')

@section('content')
    <div class="container">
        <h1 class="mb-4">Все лайки</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th class="text-center">Статья</th>
                                <th class="text-center">Кто лайкнул</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                @if($post->likedUsers->count() > 0)
                                    <tr>
                                        <td>
                                            <a href="{{ route('post.show', $post) }}" target="_blank" class="text-info">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td>
                                            @foreach($post->likedUsers as $user)
                                                <form action="{{ route('admin.like.delete', ['post' => $post->id, 'user' => $user->id]) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <span class="badge bg-info">{{ $user->name }}
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Удалить лайк у {{ $user->name }}?')">
                                                            <i class="far fa-trash" role="button"></i>
                                                        </button>
                                                    </span>
                                                </form>
                                            @endforeach
                                        </td>

                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
