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
                    <div class="col-3">
                        <a href="{{ route('admin.post.create') }}" class="btn btn-block btn-primary">Добавить
                            пост</a>
                    </div>
                <div class="col-3">
                    <form action="{{ route('admin.post.restore') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-block btn-success">Восстановить удаленные</button>
                    </form>
                </div>
                <div class="col-3">
                    <form action="{{ route('admin.post.destroy') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-block btn-danger">Очистить корзину</button>
                    </form>
                </div>
            </div>

            @if(session('info'))
                <div class="row p-2">
                    <div class="alert alert-info text-center w-45">
                        {{ session('info') }}
                    </div>
                </div>
            @endif

                <h1 class="text-center">Посты</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Название статьи</th>
                                        <th class="text-center">Дата создания</th>
                                        <th class="text-center">Просмотр</th>
                                        <th class="text-center">Редактировать</th>
                                        <th class="text-center">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td class="text-center">{{ $post->id }}</td>
                                        <td class="text-center"><a href="{{ route('admin.post.show', $post) }}" class="text-info">{{ $post->title }}</a></td>
                                        <td class="text-center">{{ $post->created_at->toDateString() }}</td>
                                        <td class="text-center"><a href="{{ route('admin.post.show', $post) }}"><i class="fas fa-eye"></i></a></td>
                                        <td class="text-center"><a href="{{ route('admin.post.edit', $post) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.post.delete', $post) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent" onclick="return confirm('Точно хотите удалить ?')">
                                                <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
