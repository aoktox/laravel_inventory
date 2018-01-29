@extends('public.layouts.public')

@section('content')
    <div class="container body">
    @include('public.layouts.partials.sidebar')
    @include('public.layouts.partials.nav')
    <!-- page content -->
        <div class="right_col" role="main">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Riwayat peminjaman
                                </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <table class="table table-bordered">
                                    <table class="table table-bordered" id="list-items">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Diajukan</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal konfirmasi</th>
                                            <th>Detail</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($transactions as $transaction)
                                                <tr>
                                                    <th scope="row">{{ $transaction->id }}</th>
                                                    <td>{{ $transaction->submitted_at }}</td>
                                                    <td>
                                                        @if($transaction->approved_at!=null)
                                                            <span class="label label-success">Disetujui</span>
                                                            oleh
                                                            <span class="label label-default">{{ \App\User::find($transaction->staff_id)->name }}</span>
                                                        @elseif($transaction->reject_at!=null)
                                                            <span class="label label-danger">Ditolak</span>
                                                            oleh
                                                            <span class="label label-default">{{ \App\User::find($transaction->staff_id)->name }}</span>
                                                        @else
                                                            <span class="label label-warning">Menunggu konfirmasi</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $transaction->approved_at.$transaction->reject_at }}</td>
                                                    <td>
                                                        <table class="table table-striped">
                                                            <thead>
                                                            <tr>
                                                                <th>Item</th>
                                                                <th>Status</th>
                                                                <th>Penerima</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($transaction->details as $detail)
                                                            <tr>
                                                                <td>{{$detail->item->name}}</td>
                                                                <td>
                                                                    @if($detail->returned_at!=null)
                                                                        <span class="label label-success">Dikembalikan</span> -
                                                                        @if($detail->return_status=='GOOD')
                                                                            <span class="label label-success">{{$detail->return_status}}</span>
                                                                        @else
                                                                            <span class="label label-danger">{{$detail->return_status}}</span>
                                                                        @endif
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    @if($detail->returned_at!=null)
                                                                        <span class="label label-default">{{ \App\User::find($detail->staff_id)->name }}</span>
                                                                    @endif

                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                        {{--<ol style="padding-left: 15px;margin-bottom:  0px;">
                                                        @foreach($transaction->details as $detail)
                                                            <li><a>{{$detail->item->name}}
                                                                @if($detail->returned_at!=null)
                                                                    <span class="badge">Dikembalikan</span>
                                                                @endif
                                                            </a>
                                                            </li>
                                                        @endforeach
                                                        </ol>--}}
                                                    </td>
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

@section('scripts')
    @parent
    <script>
        $(document).ready(function () {

        })
    </script>
@endsection