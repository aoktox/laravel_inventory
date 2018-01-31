@extends('admin.layouts.app')

@section('page_desc','')

@section('content')
<!-- page content -->

        <div class="center_col" role="main" method="post">
            {{csrf_field()}}
          {{ method_field('PUT') }}
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-exchange"></i> Item Out Detail </h3>
              </div>
              <div class="title_right">
                <div class="col-md-5 col-xs-12 form-group pull-right top_search">
                  <a href="{{url('admin/itemout')}}"><button class="btn btn-primary" type="button">Back</button></a>
                  <a href="item-out.html"><button class="btn btn-primary" type="button">Save</button></a>
                  <!--<a href="#"><button type="submit" class="btn btn-success">Recive All</button></a>-->
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
                        <label class="control-label col-md-8" id="id-transaction">: {{$data->id}}</label>
                      </div>

                      <label class="control-label col-md-2 col-sm-3 col-xs-12">Submitted</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-8" id="submited">: {{$data->submitted_at}} </label>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">User Id</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-8" id="id-user">: {{$data->user_id}}</label>
                      </div>

                      <label class="control-label col-md-2 col-sm-3 col-xs-12">Approved</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-8" id="submited">: {{$data->approved_at}}</label>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="form-group">
                      <label class="control-label col-md-2 col-sm-3 col-xs-12">User Name</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-8" id="user-name">: {{$data->users->name}}</label>
                      </div>

                      <label class="control-label col-md-2 col-sm-3 col-xs-12">Admin Name</label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <label class="control-label col-md-8" id="submited">: </label>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="ln_solid"></div>

                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>Item Id</th>
                          <th>Item Name</th>
                          <th>Quantity</th>
                          <th>Description</th>
                          <th>Condition</th>
                          <th>Recive</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($model as $mdl)
                        @if($mdl->transaction_id == $data->id)
                        <tr>
                          <td>{{$mdl->item_id}}</td>
                          <td>{{$mdl->item->name}}</td>
                          <td>{{$mdl->qty}}</td>
                          <td>{{$mdl->desc}}</td>
                          <td>
                            <div id="status" class="btn-group" data-toggle="buttons">
                              <label class="btn btn-default btn-xs" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="status" value="GOOD"> &nbsp; Good &nbsp;
                              </label>
                              <label class="btn btn-primary btn-xs" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                <input type="radio" name="status" value="BAD"> Bad
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="icheckbox_flat-green checked">
                                <input type="checkbox" class="flat" checked="checked"><ins class="iCheck-helper"></ins>
                            </div>
                          </td>
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