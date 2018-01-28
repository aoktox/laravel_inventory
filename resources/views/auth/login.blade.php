@extends('auth.layouts.auth')

@section('title','Login Petugas')
@section('body_class','login')

@section('content')
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                    <h1>Dashboard petugas</h1>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if (!$errors->isEmpty())
                            <div class="alert alert-danger" role="alert">
                                {!! $errors->first() !!}
                            </div>
                        @endif

                    <div>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail" required autofocus>
                    </div>
                    <div>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <div class="checkbox pull-left">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Selalu login
                        </label>
                    </div>
                        <div class="clearfix" style="margin-bottom: 15px"></div>
                    <div>
                        <button class="btn btn-default submit pull-left" >Login</button>
                        <a class="reset_pass pull-right" href="{{ route('password.request') }}">Lupa password
                        </a>
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