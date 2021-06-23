@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Bracket</a>
    <a class="breadcrumb-item" href="#">Manufacturers</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="icon ion-ios-gear-outline"></i>
  <div>
    <h4>Manufacturer add</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label">Manufacturer Add</h6>
        <p class="br-section-text">A form with a label on top of each form control.</p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.manufacturers.index') }}" class="btn btn-primary">Manufacturers List</a>
      </dib>
    </div>
    <form action="{{ route('admin.manufacturers.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Firstname: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="firstname" value="John Paul" placeholder="Enter firstname">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Lastname: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="lastname" value="McDoe" placeholder="Enter lastname">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-4">
          <div class="form-group">
            <label class="form-control-label">Email address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="email" value="johnpaul@yourdomain.com" placeholder="Enter email address">
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-8">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Mail Address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="address" value="Market St. San Francisco" placeholder="Enter address">
          </div>
        </div><!-- col-8 -->
        <div class="col-lg-4">
          <div class="form-group mg-b-10-force">
            <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
            <select class="form-control select2" data-placeholder="Choose country">
              <option label="Choose country"></option>
              <option value="USA">United States of America</option>
              <option value="UK">United Kingdom</option>
              <option value="China">China</option>
              <option value="Japan">Japan</option>
            </select>
          </div>
        </div><!-- col-4 -->
      </div><!-- row -->

      <div class="form-layout-footer">
        <button class="btn btn-info" type="submit">Submit Form</button>
        <button class="btn btn-secondary" type="reset">Cancel</button>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
    </form>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','Manufacturers List')
@push('js')


@endpush
@push('css')

@endpush