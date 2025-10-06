@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.includes.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <h1 class="text-center">Все комментарии</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Комментарий</th>
                                        <th class="text-center">Автор</th>
                                        <th class="text-center">Дата создания</th>
                                        <th class="text-center">Редактировать</th>
                                        <th class="text-center">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td class="text-center">{{ $comment->id }}</td>
                                            <td class="text-center">{{ $comment->message }}</td>
                                            <td class="text-center">{{ $comment->user->name }}</td>
                                            <td class="text-center">{{ $comment->created_at->toDateString() }}</td>
                                            <td class="text-center"><a href="{{ route('admin.comment.edit', $comment) }}" class="text-success"><i class="far fa-pencil-alt"></i></a></td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.comment.delete', $comment) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="border-0 bg-transparent" onclick="return confirm('Вы хотите удалить комментарий ?')">
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

