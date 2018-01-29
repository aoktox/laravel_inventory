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
                                <h2>Detail peminjaman
                                    <small>Klik konfirmasi untuk memvalidasi dan mengirim permintaan</small>
                                </h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <section class="content invoice">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-xs-12 invoice-header">
                                            <h1>
                                                <i class="fa fa-globe"></i> Detail
                                                <small class="pull-right">Date: {{ Carbon\Carbon::now() }}</small>
                                            </h1>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            Peminjam
                                            <address>
                                                <strong>{{ Auth::user()->name }}</strong>
                                                <br>Email: {{ Auth::user()->email }}
                                                <br>Tanggal bergabung: {{ Auth::user()->created_at }}
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- Table row -->
                                    <div class="row">
                                        <div class="col-xs-12 table">
                                            <table class="table table-striped" id="list_items">
                                                <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th style="width: 59%">Description</th>
                                                    <th>QTY</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class="col-xs-12">
                                            <button class="btn btn-success pull-right" id="btn_submit_req">
                                                <i class="fa fa-credit-card"></i> Konfirmasi
                                            </button>
                                            <button class="btn btn-danger pull-right" style="margin-right: 5px;" id="cancel_cart">
                                                <i class="fa fa-remove"></i> Batal
                                            </button>
                                        </div>
                                    </div>
                                </section>
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
            var cart_items = JSON.parse(localStorage.getItem('item'));

            $.each(cart_items, function( index, value ) {
                // alert( index + ": " + value );
                $('#list_items').append(`<tr><td>${value.id}</td><td>${value.name}</td><td>${value.desc}</td><td>${value.qty}</td></tr>`)
            });

            if(cart_items===null){
                $("#cancel_cart,#btn_submit_req").attr('disabled','disabled')
            }

            $("#cancel_cart").click(function(e){
                e.preventDefault();
                var r = confirm("Yakin?");
                if (r === true) {
                    localStorage.removeItem('item');
                    location.reload();
                }
            });
            $("#btn_submit_req").click(function(e){
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: '{{ route('user.do_pinjam') }}',
                    data: {param : JSON.parse(localStorage.getItem('item'))},
                    success: function( msg ) {
                        if(!msg.error) {
                            alert(msg.message);
                            localStorage.removeItem('item');
                            window.location = "{{ route('user.riwayat_pinjam') }}";
                        }
                    }
                });
            });
        })
    </script>
@endsection