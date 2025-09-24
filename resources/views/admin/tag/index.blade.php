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
                        <a href="{{ route('admin.tag.create') }}" class="btn btn-block btn-primary">Добавить тэг</a>
                    </div>
                </div>
                <h1 class="text-center">Тэги</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Название тэга</th>
                                        <th class="text-center">Дата создания</th>
                                        <th class="text-center">Просмотр</th>
                                        <th class="text-center">Редактировать</th>
                                        <th class="text-center">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($tags as $tag)
                                    <tr>
                                        <td class="text-center">{{ $tag->id }}</td>
                                        <td class="text-center"><a href="{{ route('admin.tag.show', $tag) }}" class="text-info">{{ $tag->title }}</a></td>
                                        <td class="text-center">{{ $tag->created_at->toDateString() }}</td>
                                        <td class="text-center"><a href="{{ route('admin.tag.show', $tag) }}"><i class="far fa-eye"></i></a></td>
                                        <td class="text-center"><a href="{{ route('admin.tag.edit', $tag) }}" class="text-success"><i class="far fa-pencil-alt"></i></a></td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.tag.delete', $tag) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="border-0 bg-transparent" onclick="return confirm('Точно хотите удалить ?')">
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

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
