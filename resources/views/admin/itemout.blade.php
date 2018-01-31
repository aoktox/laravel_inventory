@extends('admin.layouts.app')

@section('page_desc','')

@section('content')
<div class="center_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-exchange"></i> Items Out </h3>
              </div>
            </div>

            <div class="clearfix"></div>            

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User Id</th>
                          <th>User Name</th>
                          <th>Admin Id</th>
                          <th>Admin Name</th>
                          <th>Approved</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($itemout as $item)
                        @if($item->approved_at!=NULL)
                        <tr>
                          <td>{{$item->user_id}}</td>
                          <td>{{$item->users->name}}</td>
                          <td>{{$item->staff_id}}</td>
                          <td>{{$item->staff}}</td>
                          <td>{{$item->approved_at}}</td>
                          <td>
                            <a href="{{url('admin/itemoutdetail/'.$item->id)}}"><button class="btn btn-primary btn-xs" type="button">View</button></a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
                        </tr>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- page content -->

@endsection