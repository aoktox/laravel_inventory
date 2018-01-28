@extends('public.layouts.public')

@section('content')
    <div class="container body">
    @include('public.layouts.partials.sidebar')
    @include('public.layouts.partials.nav')
    <!-- page content -->
        <div class="right_col" role="main">

        </div>
        <!-- /page content -->
        @include('public.layouts.partials.footer')
    </div>
@endsection
