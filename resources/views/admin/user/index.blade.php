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
                        <a href="{{ route('admin.user.create') }}" class="btn btn-block btn-primary">Добавить
                            пользователя</a>
                    </div>
                    <div class="col-3">
                        <form action="{{ route('admin.user.restore') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-block btn-success">Восстановить удаленные</button>
                        </form>
                    </div>
                    <div class="col-3">
                        <form action="{{ route('admin.user.destroy') }}" method="POST">
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

                <h1 class="text-center">Пользователи</h1>
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Имя пользователя</th>
                                        <th class="text-center">Дата регистрации</th>
                                        <th class="text-center">Просмотр</th>
                                        <th class="text-center">Редактировать</th>
                                        <th class="text-center">Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="text-center">{{ $user->id }}</td>
                                        <td class="text-center"><a href="{{ route('admin.user.show', $user) }}" class="text-info">{{ $user->name }}</a></td>
                                        <td class="text-center">{{ $user->created_at->toDateString() }}</td>
                                        <td class="text-center"><a href="{{ route('admin.user.show', $user) }}"><i class="fas fa-eye"></i></a></td>
                                        <td class="text-center"><a href="{{ route('admin.user.edit', $user) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.user.delete', $user) }}" method="POST">
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
