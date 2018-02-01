@extends('admin.layouts.app')

@section('page_desc','')

@section('content')
<!-- page content -->

        <div class="center_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-cubes"></i> Edit User</h3>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form action="{{ url('admin/useredit/'.$model->id) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      {{csrf_field()}}
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user-id">User Id </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  readonly="readonly" id="user-id" name="user-id" class="form-control col-md-7 col-xs-12" value="{{ $model->id }}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" placeholder="name" value="{{ $model->name }}">
                        </div>
                        <div class="alert">please put item name here</div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="email" value="{{ $model->email }}">
                        </div>
                        <div class="alert">please put email here</div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pass">Password <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="Password" id="pass" name="pass" required="required" class="form-control col-md-7 col-xs-12" placeholder="pass" value="passpass">
                        </div>
                        <div class="alert">please put password here</div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <a href="{{ URL::previous() }}"><button class="btn btn-primary" type="button">Cancel</button></a>
                          <button type="submit" class="btn btn-success">Save</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        
        <!-- /page content -->

@endsection