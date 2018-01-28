@extends('admin.layouts.app')

@section('page_desc','')

@section('content')
<div class="col-md-12">
    <div class="row top_tiles">
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-database"></i></div>
                <div class="count">{{ DB::table('items')->count() }}</div>
                <h3>Item</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-envelope-open-o"></i></div>
                <div class="count">{{ DB::table('transaction_details')->whereNull('returned_at')->groupBy('transaction_id')->count() }}</div>
                <h3>Peminjaman aktif</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-archive"></i></div>
                <div class="count">{{ DB::table('transaction_details')->whereNotNull('returned_at')->groupBy('transaction_id')->count() }}</div>
                <h3>Peminjaman selesai</h3>
            </div>
        </div>
        <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
                <div class="icon"><i class="fa fa-male"></i></div>
                <div class="count">{{ DB::table('users')->where('is_admin',false)->count() }}</div>
                <h3>Peminjam</h3>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2 class="pull-left">Peminjaman baru</h2>
            <div class="clearfix"></div>

        </div>
        <div class="x_content">

        </div>
    </div>
</div>
@endsection
