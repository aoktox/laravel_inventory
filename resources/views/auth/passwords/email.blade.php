@extends('auth.layouts.auth')

@section('title','Login Petugas')
@section('body_class','login')

@section('content')
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <h1>Reset password</h1>

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div>
                            @if ($errors->has('email'))
                                <div class="alert alert-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </div>
                            @endif
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="clearfix" style="margin-bottom: 5px"></div>
                        <button type="submit" class="btn btn-primary">
                            Atur ulang password
                        </button>
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