@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите ваш email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Новая ссылка на подтверждение email была отправлена вам на почту.') }}
                        </div>
                    @endif

                    {{ __('Пожалуйста подтвердите свой email перед началом работы.') }}
                    {{ __('Если вы не получили письмо') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите сюда чтобы отправить еще') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
