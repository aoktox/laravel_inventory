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
             <div class="clearfix"></div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <table class="table table-bordered">
                                        <table class="table table-bordered" id="list-items">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Peminjam</th>
                                                <th>Waktu Pinjam</th>
                                                <th>Detail</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($transactions as $users)
                                            @if($users->approved_at==null)
                                            <tr>
                                                <th scope="row">{{ $users->id}}</th>
                                                <td>{{ $users->users->name }}</td>
                                                <td>{{ $users->submitted_at}}</td>
                                                <td>
                                                    <a href="{{ route('admin.detail')}}"><button type="button" class="btn btn-primary">Detail</button></a>
                                                </td>
                                            </tr>
                                            @endif
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
</div>
@endsection
