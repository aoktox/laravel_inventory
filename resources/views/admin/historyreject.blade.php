@extends('admin.layouts.app')

@section('page_desc','')

@section('content')
<!-- page content -->

        <div class="center_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-exchange"></i> History Detail </h3>
              </div>
              <div class="title_right">
                <div class="col-md-2 col-xs-12 form-group pull-right top_search">
                  <a href="{{url('admin/history')}}"><button class="btn btn-primary" type="button">Back</button></a>
                </div>
              </div>
              <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>            

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">

                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">Transaction Id</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-5" id="id-transaction">: {{$data->id}}</label>
                      </div>
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">User Id</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-5" id="id-user">: {{$data->user_id}} </label>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">Submitted</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-5" id="submited">: {{$data->submitted_at}}</label>
                      </div>
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">User Name</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-5" id="user-name">: {{$data->users->name}}</label>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="ln_solid"></div>

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Item Id</th>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>Description</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($model as $mdl)
                        @if($mdl->transaction_id == $data->id)
                        <tr>
                          <th>{{$mdl->id}}</th>
                          <td>{{$mdl->item_id}}</td>
                          <td>{{$mdl->item->name}}</td>
                          <td>{{$mdl->qty}}</td>
                          <td>{{$mdl->desc}}</td>
                        </tr>
                        @endif
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- /page content -->

@endsection