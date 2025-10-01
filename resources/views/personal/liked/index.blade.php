@extends('personal.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('personal.includes.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <h1 class="text-center">Понравившиеся посты</h1>
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
                                        <th class="text-center">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td class="text-center">{{ $post->id }}</td>
                                            <td class="text-center"><a href="{{ route('admin.post.show', $post) }}" class="text-info">{{ $post->title }}</a></td>
                                            <td class="text-center">{{ $post->created_at->toDateString() }}</td>
                                            <td class="text-center"><a href="{{ route('admin.post.show', $post) }}"><i class="far fa-eye"></i></a></td>
                                            <td class="text-center">
                                                <form action="{{ route('personal.liked.delete', $post) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="border-0 bg-transparent" onclick="return confirm('Вам больше не нравится этот пост ?')">
                                                        <i class="far fa-trash text-danger" role="button"></i>
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
                <!-- /.row -->

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

