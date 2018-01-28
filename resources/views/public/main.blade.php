@extends('public.layouts.public')

@section('content')
    <div class="container body">
    @include('public.layouts.partials.sidebar')
    @include('public.layouts.partials.nav')
    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Daftar item</h3>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Cari item...">
                                <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Go!</button>
                        </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <table class="table table-bordered">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <th>Qty</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($items as $item)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->desc }}</td>
                                                <td>{{ $item->qty }}</td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <!-- /page content -->
        @include('public.layouts.partials.footer')
    </div>
@endsection
