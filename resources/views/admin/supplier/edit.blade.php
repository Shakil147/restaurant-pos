@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item text-capitalize" href="{{ route('admin.suppliers.index') }}">suppliers</a>
    <span class="breadcrumb-item active">Edit</span>
  </nav>
</div>
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4 class=" text-capitalize">supplier Edit</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label  text-capitalize">supplier Edit</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.suppliers.index') }}" class="btn btn-primary float-right  text-capitalize">supplier List</a>
      </dib>
    </div>
    <form action="{{ route('admin.suppliers.update',$supplier->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">


        <div class="col-lg-12">
          <div class="form-group">
              <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ $supplier->name }}" placeholder="Enter Name" required>  
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
              <label class="form-control-label">Company: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="company" value="{{ $supplier->company }}" placeholder="Enter Company" required>  
            @error('company')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="phone" value="{{ $supplier->phone }}" placeholder="Enter Phone" required>  
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="email" value="{{ $supplier->email }}" placeholder="Enter Email" required>  
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="address" value="{{ $supplier->address }}" placeholder="Enter Address" required>  
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Warehouse: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="warehouse" value="{{ $supplier->warehouse }}" placeholder="Enter Warehouse" required>  
            @error('warehouse')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
            <textarea class="form-control" rows="4" name="description" placeholder="Enter Description">{!! $supplier->description !!}</textarea>
            @error('warehouse')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>        
        <div class="col-lg-12">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
            <input class="" type="file" name="image" value="" placeholder="Enter Image"  accept="image/x-png,image/gif,image/jpeg" >  
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($supplier->image!=null)
            <div class="col-6">
              <img src="{{ asset($supplier->image) }}" alt="" width="80px" class="img-thumbnail">
            </div>
            @endif
            
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Status: </label>
            <input class=""  type="checkbox" name="status" @if($supplier->status==1) checked @endif value="1">
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
      </div><!-- row -->

      <div class="form-layout-footer">
        <button class="btn btn-secondary" type="reset">Reset</button>
        <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save and Continue</button>
        <button class="btn btn-info" type="submit">Save</button>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
    </form>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','Supplier Edit')
@push('js')


@endpush
@push('css')

@endpush