@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">EastMan</a>
    <a class="breadcrumb-item" href="#">Web Info</a>
    <span class="breadcrumb-item active">Edit</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Web Info</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label">Web Info Edit</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        {{-- <a href="{{ route('admin.webs.index') }}" class="btn btn-primary float-right">web List</a> --}}
      </dib>
    </div>
    <form action="{{ route('admin.web.update') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ $web->name }}" placeholder="Enter Name " required>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-md-12">
          <div class="form-group">
            <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="address" value="{{ $web->address }}" placeholder="Enter Address " required>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label">Service Charge: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="service_charge" value="{{ $web->service_charge }}" placeholder="Enter Service Charge " required>
            @error('service_charge')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label">Vat: (%)<span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="vat" value="{{ $web->vat }}" placeholder="Enter Vat %" required>
            @error('vat')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label">Tax: (%)<span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="tax" value="{{ $web->tax }}" placeholder="Enter Tax %" required>
            @error('tax')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
            <input class="form-control" type="email" name="email" value="{{ $web->email }}" placeholder="Enter Email" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="phone" value="{{ $web->phone }}" placeholder="Enter Email" required>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Facebook: </label>
            <input class="form-control" type="text" name="fb" value="{{ $web->fb }}" placeholder="Enter Facebook ">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Twitter: </label>
            <input class="form-control" type="text" name="twitter" value="{{ $web->twitter }}" placeholder="Enter Twitter " >
            @error('twitter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Instagram: </label>
            <input class="form-control" type="text" name="Instagram" value="{{ $web->instagram }}" placeholder="Enter instagram " >
            @error('instagram')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Youtube: </label>
            <input class="form-control" type="text" name="youtube" value="{{ $web->youtube }}" placeholder="Enter Youtube " >
            @error('youtube')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Gmap Iframe: </label>
            <input class="form-control" type="text" name="iframe" value="{{ $web->iframe }}" placeholder="Enter Gmap Iframe " >
            @error('iframe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-6">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">Logo: </label>
            <input class="" type="file" name="logo" value="" placeholder="Enter Logo"  accept="image/x-png,image/gif,image/jpeg" >  
            @error('logo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($web->logo)
            <div class="col-6">
              <img src="{{ asset($web->logo) }}" width="80" alt="">
              <span>Old Logo</span>
            </div>@endif
            
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-6">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label">Icon: </label>
            <input class="" type="file" name="icon" value="" placeholder="Enter Icon"  accept="image/x-png,image/gif,image/jpeg" >  
            @error('icon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            @if($web->icon)
            <div class="col-6">
              <img src="{{ asset($web->icon) }}" width="80" alt="">
              <span>Old Icon</span>
            </div>@endif
            
          </div>
        </div><!-- col-4 -->
      </div><!-- row -->

      <div class="form-layout-footer">
        <button class="btn btn-secondary" type="reset">Reset</button>
        <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save and continue</button>
        <button class="btn btn-info" type="submit">Save</button>
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
    </form>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','Web Info Edit')
@push('js')

<script type="text/javascript" src="{{ asset('template') }}\lib\ckeditor\ckeditor.js"></script>
<script>
document.addEventListener( 'DOMContentLoaded',function()
{
 CKEDITOR.replace( 'about_us' ); 
 CKEDITOR.replace( 'why' ); 
});

</script>

@endpush
@push('css')

@endpush