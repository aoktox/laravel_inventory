@extends('admin.layouts.app')

@section('page_desc','')

@section('content')
<!-- page content -->

        <div class="center_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-exchange"></i> Transaction History </h3>
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
                          <th>Transaction Id</th>
                          <th>User Name</th>
                          <th>Admin Name</th>
                          <th>Submit</th>
                          <th>Approve</th>
                          <th>Reject</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($historis as $history)
                        @if($history->approved_at != NULL)
                        <tr>
                          <td>{{$history->id}}</td>
                          <td>{{$history->users->name}}</td>
                          <td>{{$history->staff}}</td>
                          <td>{{$history->submitted_at}}</td>
                          <td>{{$history->approved_at}}</td>
                          <td>{{$history->reject_at}}</td>
                          <td>
                            <a href="{{ url('admin/historydetail/'.$history->id) }}"><button class="btn btn-primary btn-xs" type="button">Detail</button></a>
                          </td>
                        </tr>
                        @elseif($history->reject_at != NULL)
                        <tr>
                          <td>{{$history->id}}</td>
                          <td>{{$history->users->name}}</td>
                          <td>{{$history->staff}}</td>
                          <td>{{$history->submitted_at}}</td>
                          <td>{{$history->approved_at}}</td>
                          <td>{{$history->reject_at}}</td>
                          <td>
                            <a href="{{ url('admin/historyreject/'.$history->id) }}"><button class="btn btn-primary btn-xs" type="button">Detail</button></a>
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