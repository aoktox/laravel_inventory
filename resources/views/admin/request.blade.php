@extends('admin.layouts.app')

@section('page_desc','')

@section('content')
<!-- page content -->

        <div class="center_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-exchange"></i> Request </h3>
              </div>
            </div>

            <div class="clearfix"></div>            

            <div class="row">
                @if( null !== session('success') )
                <p>{{ session('success') }}</p>
                @endif
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Id Transaksi</th>
                          <th>User Id</th>
                          <th>User Name</th>
                          <th>Submitted</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($transactions as $transaction)
                        @if($transaction->approved_at==NULL)
                        @if($transaction->reject_at==NULL)
                        <tr>
                          <td>{{$transaction->id}}</td> 
                          <td>{{$transaction->user_id}}</td>
                          <td>{{$transaction->users->name}}</td>
                          <td>{{$transaction->submitted_at}}</td>
                          <td>
                            <a href="{{ url('admin/requestdetail/'.$transaction->id) }}"><button class="btn btn-primary btn-xs" type="button">View</button></a>
                          </td>
                        </tr>
                        @endif
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                      {!! $transactions->links() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- /page content -->
@endsection