@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item" href="{{ route('admin.subcategories.index') }}">Sub Categories</a>
    <span class="breadcrumb-item active">Edit</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Category Edit</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label">Category Edit</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.subcategories.index') }}" class="btn btn-primary float-right">Sub Category List</a>
      </dib>
    </div>
    <form action="{{ route('admin.subcategories.update',$category->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="col-lg-12">
          <div class="form-group row">
              <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ $category->name }}" placeholder="Enter Name"  required>  
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->

        <div class="col-lg-6">
          <div class="form-group row">
              <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
            <select name="parent_id" id="" class="form-control" required>
              @foreach($categories as $row)
              <option value="{{ $row->id }}"  {{ $category->parent_id == $row->id ? 'selected' : null }}>{{ $category->name }}</option>
              @endforeach
            </select>
            @error('parent_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Status: </label>
            <input   type="checkbox" name="status" @if($category->status==1) checked @endif value="1">
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

@push('title','Category Add')
@push('js')


@endpush
@push('css')

@endpush