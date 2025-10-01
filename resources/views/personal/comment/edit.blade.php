@extends('personal.layouts.main')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @include('personal.includes.header')
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">
                        <h2>Редактирование комментария</h2>
                        <form action="{{ route('personal.comment.update', $comment) }}" method="POST" class="w-50">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <textarea class="form-control" name="message" cols="75" rows="10">{{ $comment->message }}</textarea>
                                @error('message')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <input type="submit" class="btn btn-success" value="Редактировать">
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

