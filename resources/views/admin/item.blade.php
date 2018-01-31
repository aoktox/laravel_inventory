@extends('admin.layouts.app')

@section('page_desc','')

@section('content')

<!-- page content -->

        <div class="center_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-cubes"></i> Item List</h3>
              </div>
              <div class="title_right">
                <div class="col-md-2 col-xs-12 form-group pull-right top_search">
                  <a href="{{route('admin.itemadd')}}"><button class="btn btn-primary" type="button">Add Item</button></a>
                </div>
              </div>
              <div class="clearfix"></div>
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
                          <th>Id Item</th>
                          <th>Name</th>
                          <th>Description</th>
                          <th>Quantity</th>
                          <th>Borrowed</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($items as $item)
                        <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->desc }}</td>
                          <td>{{ $item->get_available() }}</td>
                          <td>{{ $item->get_borrowed() }}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->status }}</td>
                          <td>
                            <a href="{{ url('admin/itemdetail/'.$item->id) }}" title="Update"><i class="fa fa-pencil"></i></a>
                            <a href="{{ url('admin/itemdelete/'.$item->id) }}" title="Delete"><i class="fa fa-trash"></i></a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      {!! $items->links() !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- /page content -->
@endsection