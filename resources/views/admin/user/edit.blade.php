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
                        <h2 class="mb-3">Редактирование пользователя: {{ $user->name }}</h2>
                        <hr>
                        <h4>Редактировать Логин</h4>
                        <form action="{{ route('admin.user.updateName', $user->id) }}" method="POST" class="w-25">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label>Логин</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-success w-100" value="Редактировать логин">
                        </form>
                        <hr>

                        <h4>Редактировать email</h4>
                        <form action="{{ route('admin.user.updateEmail', $user->id) }}" method="POST" class="w-25">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email', $user->email) }}">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-success w-100" value="Редактировать email   ">
                        </form>
                        <hr>

                        <h4>Редактировать пароль</h4>
                        <form action="{{ route('admin.user.updatePassword', $user->id) }}" method="POST" class="w-25">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label>Пароль</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Повторите пароль</label>
                                <input type="password" name="password_confirmation" class="form-control">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-success w-100" value="Редактировать пароль">
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
