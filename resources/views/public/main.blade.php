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
                                        <table class="table table-bordered" id="list-items">
                                            <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <th>Tersedia</th>
                                                <th>Pilihan</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($items as $item)
                                            @if($item->get_available() != 0)
                                            <tr>
                                                <th scope="row">{{ $item->id }}</th>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->desc }}</td>
                                                <td>{{ $item->get_available() }}</td>
                                                <td><button type="button" class="btn btn-primary" data-item_name="{{$item->name}}" data-item_id="{{$item->id}}" data-item_avail="{{$item->get_available()}}" data-toggle="modal" data-target="#bs-pinjam-modal-sm">Pinjam</button></td>
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
        <!-- /page content -->
        @include('public.layouts.partials.footer')

        <div class="modal fade" id="bs-pinjam-modal-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="bs-pinjam-modal-smLabel">Pinjam item : <span id="nama-item-modal"></span></h4>
                    </div>
                    <div class="modal-body">
                        <form name="add_to_cart" id="add_to_cart">
                            <input type="hidden" id="item_avail">
                            <input type="hidden" name="item_id" id="item_id">
                            <input type="hidden" name="item_name" id="item_name_">
                            <div class="form-group">
                                <label for="recipient-name" class="control-label">Jumlah:</label>
                                <input type="number" class="form-control" id="item-jumlah-pinjam" name="item-jumlah-pinjam">
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="control-label">Keperluan:</label>
                                <textarea class="form-control" id="message-item-pinjam" name="message-item-pinjam"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-add-to-cart" >Konfirmasi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $('#list-items').DataTable();
        $('#bs-pinjam-modal-sm').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var item_name = button.data('item_name');
            var item_avail = button.data('item_avail');

            var modal = $(this);
            modal.find('#item_id').val(button.data('item_id'));
            modal.find('#nama-item-modal').text(item_name);
            modal.find('#item-jumlah-pinjam').attr("placeholder", "Stok tersedia : " +item_avail);
            modal.find('#item-jumlah-pinjam').attr("max",item_avail);
            modal.find('#item_avail').val(item_avail);
            modal.find('#item_name_').val(item_name);
        });

        $('#bs-pinjam-modal-sm').on('hide.bs.modal', function () {
            $('#message-item-pinjam').val('').blur();
            $('#item-jumlah-pinjam').val('').blur();
        });

        $("#btn-add-to-cart").click(function(e){
            e.preventDefault();
            var item_id = $("#item_id").val();
            var item_name = $("#item_name_").val();
            var item_qty = $("#item-jumlah-pinjam").val();
            var item_desc = $("textarea#message-item-pinjam").val();

            if(item_qty<1||item_qty>parseInt($('#item_avail').val())){
                alert("Invalid item QTY");
                return;
            }
            var tmp_item=[];
            if(localStorage.item!=null)
                tmp_item = JSON.parse(localStorage.item);
            tmp_item.push({id: item_id,name: item_name, qty: item_qty, desc : item_desc});
            localStorage.setItem('item',JSON.stringify(tmp_item));
            alert("Sukses ditambahkan ke cart");
            update_cart()
            $('#bs-pinjam-modal-sm').modal('hide')
        });
    </script>
@endsection