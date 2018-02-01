@extends('admin.layouts.app')

@section('page_desc','')

@section('content')
<!-- page content -->

        <div class="center_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-cubes"></i> Edit Item</h3>
              </div>
            </div>
              
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br />
                    <form action="{{ url('admin/itemedit/'.$model->id) }}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        {{csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item-id">Item Id </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input  readonly="readonly" id="item-id" name="item-id" class="form-control col-md-7 col-xs-12" value="{{ $model->id }}">
                        </div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item-name">Item Name <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="item-name" name="item-name" required="required" class="form-control col-md-7 col-xs-12" placeholder="item name" value="{{ $model->name }}">
                        </div>
                        <div class="alert">please put item name here</div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="desc">Description <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="desc" name="desc" required="required" class="form-control col-md-7 col-xs-12" placeholder="description" value={{ $model->desc }}>
                        </div>
                        <div class="alert">please put item name here</div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item-id">Quantity <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="qty" name="qty" required="required" data-validate-minmax="1,500" class="form-control col-md-7 col-xs-12" placeholder="quantity" value="{{ $model->qty }}">
                        </div>
                        <div class="alert">please put quantity here</div>
                      </div>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="item-id">Price <span class="required"></span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="price" name="price" required="required" data-validate-minmax="1,1000000000" class="form-control col-md-7 col-xs-12" placeholder="price" value="{{ $model->price }}">
                        </div>
                        <div class="alert">please put price here</div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="status" class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="status" value="GOOD"> &nbsp; Good &nbsp;
                            </label>
                            <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="status" value="BAD"> Bad
                            </label>
                          </div>
                        </div>
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