@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item text-capitalize" href="{{ route('admin.staff.index') }}">staff</a>
    <span class="breadcrumb-item active">Edit</span>
  </nav>
</div>
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4 class=" text-capitalize">staff Edit</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label  text-capitalize">staff Edit</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.staff.index') }}" class="btn btn-primary float-right  text-capitalize">staff List</a>
      </dib>
    </div>
    <form action="{{ route('admin.staff.update',$staff->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">

        <div class="col-lg-8">
          <div class="form-group">
              <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ $staff->name }}" placeholder="Enter Name" required>  
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-4">
          <div class="form-group">
              <label class="form-control-label">Date Of Birth: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" name="dob" value="{{ Carbon\Carbon::parse($staff->dob)->format('Y-m-d') }}" placeholder="Enter Date Of Birth" required>  
            @error('dob')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="phone" value="{{ $staff->phone }}" placeholder="Enter Phone" required>  
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
            <input class="form-control" type="text" name="email" value="{{ $staff->email }}" placeholder="Enter Email" required>  
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="form-control-label">Uid Type: <span class="tx-danger">*</span></label>
            <select name="uid_type" id="uid_type" class="form-control" required>
              <option value="nid" @if($staff->staf_type_id=='nid') selected @endif>Nid</option>
              <option value="birth" @if($staff->staf_type_id=='birth') selected @endif>Birth Certificate</option>
            </select>
            @error('uid_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <label class="form-control-label">Uid: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="uid" value="{{ $staff->uid }}" placeholder="Enter uid" required>  
            @error('uid')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label">Staf Type: <span class="tx-danger">*</span></label>
            <select name="staf_type_id" id="staf_type_id" class="form-control">
              <option value="">select Staf Type</option>
              @foreach($types as $key=> $row)
              <option value="{{ $row->id }}" @if($staff->staf_type_id==$row->id) selected @endif>{{ $row->name }}</option>
              @endforeach
            </select>
            @error('staf_type_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label class="form-control-label">Join Date: <span class="tx-danger">*</span></label>
            <input class="form-control" type="date" name="join_date" value="{{ Carbon\Carbon::parse($staff->join_date)->format('Y-m-d') }}" placeholder="Enter Join Date" required>  
            @error('join_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="address" value="{{ $staff->address }}" placeholder="Enter Address" required>  
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Description: <span class="tx-danger">*</span></label>
            <textarea class="form-control" rows="4" name="description" placeholder="Enter Description">{!! $staff->description !!}</textarea>
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
            @if($staff->image!=null)
            <div class="col-6">
              <img src="{{ asset($staff->image) }}" alt="" width="80px" class="img-thumbnail">
            </div>
            @endif
            
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Status: </label>
            <input class=""  type="checkbox" name="status" @if($staff->status==1) checked @endif value="1">
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

@push('title','staff Edit')
@push('js')


@endpush
@push('css')

@endpush