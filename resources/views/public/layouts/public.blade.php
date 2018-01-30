@extends('layouts.app')

@section('title','Sistem Inventory')
@section('body_class','nav-md')

@section('page')

    @yield('content')

@endsection

@section('styles')
    <link href="{{mix('assets/css/datatables.css')}}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ mix('assets/js/datatables.js') }}"></script>
    <script>
        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function update_cart() {
            if(localStorage.getItem('item')){
                $("#cart_items").text((JSON.parse(localStorage.getItem('item'))).length)
            }
        }
        $(document).ready(function () {
            update_cart();
        })
    </script>
@endsection