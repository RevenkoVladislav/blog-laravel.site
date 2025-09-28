@extends('admin.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('admin.includes.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <h1 class="text-center">Пользователь: {{ $user->name }}</h1>
                <div class="row d-flex justify-content-center">
                    <div class="col-8">
                        <div class="card">

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <tbody>
                                        <tr>
                                            <td class="text-center">ID</td>
                                            <td class="text-center">{{ $user->id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Логин</td>
                                            <td class="text-center">{{ $user->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Email</td>
                                            <td class="text-center">{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Роль</td>
                                            <td class="text-center">{{ $roles[$user->role] }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">Дата регистрации</td>
                                            <td class="text-center">{{ $user->created_at->toDateString() }}</td>
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
                        <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-block btn-success">Редактировать
                            пользователя</a>
                    </div>
                </div>

                <div class="row justify-content-center mb-3">
                    <div class="col-3">
                        <form action="{{ route('admin.user.delete', $user) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-block btn-danger"
                                    onclick="return confirm('Точно хотите удалить ?')">Удалить пользователя</button>
                        </form>
                    </div>
                </div>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
