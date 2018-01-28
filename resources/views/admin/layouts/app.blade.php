@extends('layouts.app')

@section('body_class','nav-md')
@section('title','Adminisrator - Inventory')

@section('page')
    <div class="container body">
        <div class="main_container">
            @include('admin.layouts.partials.nav')
            @include('admin.layouts.partials.sidebar')

            <div class="right_col" role="main">
                <div class="page-title">
                    <div class="title_left">
                        <h1 class="h3">@yield('page_desc')</h1>
                    </div>

                </div>
                @yield('content')
            </div>

            <footer>
                @include('admin.layouts.partials.footer')
            </footer>
        </div>
    </div>
@endsection
