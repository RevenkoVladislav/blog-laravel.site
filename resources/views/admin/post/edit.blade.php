@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.includes.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h2>Редактирование поста: {{ $post->title }}</h2>
                        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @method('PATCH')
                            @csrf
                            <div class="form-group w-50">
                                <input type="text" name="title" class="form-control" placeholder="Название поста" value="{{ old('title', $post->title) }}">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea id="summernote" name="content">
                                    {{ old('content', $post->content) }}
                                </textarea>
                                @error('content')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Изменить главное изображение</label>
                                <div class="w-100 mb-3">
                                    <p>Текущее главное изображение</p>
                                    <img src="{{ Storage::url($post->main_image) }}" alt="main_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="main_image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                </div>
                                @error('main_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Изменить превью</label>
                                <div class="w-100 mb-3">
                                    <p>Текущее превью изображение</p>
                                    <img src="{{ Storage::url($post->preview_image) }}" alt="preview_image" class="w-50">
                                </div>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="preview_image">
                                        <label class="custom-file-label">Выберите изображение</label>
                                    </div>
                                </div>
                                @error('preview_image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label for="">Выберите Категорию</label>
                                <select class="custom-select" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('category_id', $post->category_id) ? 'selected' : '' }}
                                        >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите тэги</label>
                                <div class="select2-purple">
                                    <select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберите тэги" data-dropdown-css-class="select2-purple" style="width: 100%;">
                                        @foreach($tags as $tag)
                                            <option
                                                {{ is_array(old('tag_ids', $post->tags->pluck('id')->toArray())) && in_array($tag->id, old('tag_ids', $post->tags->pluck('id')->toArray())) ? 'selected' : '' }}
                                                value="{{ $tag->id }}">
                                                <!--tags без () т.к нам нужно обратиться к коллекции а не создавать sql
                                                т.к pluck вернет коллекцию мы не сможем выполнить is_array, нужно привести коллекцию к массиву
                                                -->
                                                {{ $tag->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success w-50" value="Редактировать">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
