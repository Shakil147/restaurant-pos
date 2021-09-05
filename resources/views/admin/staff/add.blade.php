@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item text-capitalize" href="{{ route('admin.staff.index') }}">staff</a>
    <span class="breadcrumb-item active">Add</span>
  </nav>
</div>
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4 class="text-capitalize">staff Add</h4>
    <p class="mg-b-0"></p>
  </div>
</div>

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label text-capitalize">staff Add</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.staff.index') }}" class="btn btn-primary float-right text-capitalize">staff List</a>
      </dib>
    </div>
    <form action="{{ route('admin.staff.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">

        <div class="col-lg-8">
          <div class="form-group">
              <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>  
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
            <input class="form-control" type="date" name="dob" value="{{ old('dob') }}" placeholder="Enter Date Of Birth" required>  
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
            <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone" required>  
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
            <input class="form-control" type="text" name="email" value="{{ old('email') }}" placeholder="Enter Email" required>  
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
              <option value="nid" @if(old('staf_type_id')=='nid') selected @endif>Nid</option>
              <option value="birth" @if(old('staf_type_id')=='birth') selected @endif>Birth Certificate</option>
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
            <input class="form-control" type="text" name="uid" value="{{ old('uid') }}" placeholder="Enter uid" required>  
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
              <option value="{{ $row->id }}" @if(old('staf_type_id')==$row->id) selected @endif>{{ $row->name }}</option>
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
            <input class="form-control" type="date" name="join_date" value="{{ old('join_date') }}" placeholder="Enter Join Date" required>  
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
            <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="Enter Address" required>  
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
            <textarea class="form-control" rows="4" name="description" placeholder="Enter Description">{!! old('description') !!}</textarea>
            @error('warehouse')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label text-capitalize">Image: <span class="tx-danger">*</span></label>
            <input class="" type="file" name="image" value="" placeholder="Enter Image"  accept="image/x-png,image/gif,image/jpeg" >  
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror           
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Status: </label>
            <input   type="checkbox" name="status" checked value="1">
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

      </div>

      <div class="form-layout-footer">
        <button class="btn btn-secondary" type="reset">Reset</button>
        <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save and Continue</button>
        <button class="btn btn-info" type="submit">Save</button>
      </div>
    </div>
    </form>
  </div>
</div>
@endsection

@push('title','Staff Edit')
@push('js')


@endpush
@push('css')

@endpush