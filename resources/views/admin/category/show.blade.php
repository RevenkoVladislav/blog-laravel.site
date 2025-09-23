@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.includes.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <h1 class="text-center">Категория: {{ $category->title }}</h1>
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td class="text-center">ID</td>
                                            <td class="text-center">{{ $category->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Название</td>
                                            <td class="text-center">{{ $category->title }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Дата создания</td>
                                            <td class="text-center">{{ $category->created_at->toDateString() }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-3">
                        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-block btn-success">Редактировать
                            категорию</a>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-3">
                        <form action="{{ route('admin.category.delete', $category) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger"
                                    onclick="return confirm('Точно хотите удалить ?')">Удалить категорию</button>
                        </form>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
