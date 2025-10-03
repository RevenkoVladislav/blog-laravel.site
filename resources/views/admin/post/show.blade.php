@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.includes.header')
        <!-- Main content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h2>Пост - {{ $post->title }}</h2>
                    <div class="form-group w-50">
                        <input type="text" name="title" class="form-control"
                               value="{{ $post->title }}" disabled>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 mx-auto">
                            {!! $post->content !!}
                        </div>
                    </div>

                    <div class="form-group w-50">
                        <p>Главное изображение</p>
                        <img style="width: 30%; height: 30%;" src="{{ asset('/storage/' . $post->main_image)  }}"
                             alt="нет изображения">
                    </div>

                    <div class="form-group w-50">
                        <p>Превью изображение</p>
                        <img style="width: 30%; height: 30%;" src="{{ asset('/storage/' . $post->preview_image)  }}"
                             alt="нет изображения">
                    </div>

                    <div class="form-group w-50">
                        <label for="">Категория</label>
                            <p>{{ $post->category->title }}</p>
                    </div>

                    <div class="form-group w-50">
                        <label>Тэги</label>
                        <div class="select2-purple">
                            <select class="select2" disabled multiple="multiple"
                                    data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach($tags as $tag)
                                    <option selected>{{ $tag->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('tag_ids')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <div class="col-3">
                    <a href="{{ route('admin.post.edit', $post) }}" class="btn btn-block btn-success">Редактировать
                        пост</a>
                </div>
            </div>

            <div class="row justify-content-center mb-3">
                <div class="col-3">
                    <form action="{{ route('admin.post.delete', $post) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-block btn-danger"
                                onclick="return confirm('Точно хотите удалить ?')">Удалить пост
                        </button>
                    </form>
                </div>
            </div>

        </div><!-- /.container-fluid -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
