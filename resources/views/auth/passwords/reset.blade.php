@extends('auth.layouts.auth')

@section('title','Lupa Password Petugas')
@section('body_class','login')

@section('content')
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="token" value="{{ $token }}">
                        <h1>Ganti password</h1>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if(count($errors)>0)
                            @foreach($errors->all() as $error)
                                <span class="help-block">
                                        <strong>{{ $error }}</strong>
                                    </span>
                            @endforeach
                        @endif

                        <div class="{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ $email or old('email') }}" required autofocus>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                             <input id="password" type="password" class="form-control" name="password" required placeholder="Password baru">
                        </div>

                        <div class="={{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Konfirmasi password baru">
                        </div>

                        <div>
                            <button class="btn btn-default submit" >Set password</button>
                        </div>
                        <div class="clearfix" style="margin-bottom: 5px"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br/>
                            <div>
                                <div class="h3">{{ config('app.name') }}</div>
                                <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    @parent

@endsection