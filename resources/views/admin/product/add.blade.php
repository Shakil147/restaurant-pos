@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item" href="{{ route('admin.products.index') }}"> Products</a>
    <span class="breadcrumb-item active">Add</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Product Add</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label">Product Add</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary float-right">Products List</a>
      </dib>
    </div>
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="col-lg-12">
          <div class="form-group row">
              <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" placeholder="Enter Name" required>  
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group row">
              <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
            <select name="categories[]" id="" multiple class="form-control select2" required>
              @foreach($categories as $row)
              @php 
                  if (old('categories') !=null) {
                   $check = in_array($row->id, old('categories')) ? 'selected' : '';
                  }else{
                      $check =  '';
                  }
              @endphp
              <option value="{{ $row->id }}" {{ $check }}>
                {!! $row->name !!}
              </option>
              @endforeach
            </select>
            @error('categories')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div><!-- col-4 -->
        <div class="col-md-6">
          <div class="form-group row">
              <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
            <input class="form-control" type="number" step="0.5" name="price" value="{{ old('price') }}" placeholder="Enter Price" required>  
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror            
          </div>
        </div><!-- col-4 -->
        <div class="col-md-6">
          <div class="form-group row">
              <label class="form-control-label">Stock: <span class="tx-danger">*</span></label>
            <input class="form-control" type="number" step="0.5" name="stock" value="{{ old('stock') }}" placeholder="Enter Price" required>  
            @error('stock')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group">
              <label class="form-control-label">Description : </label>
            <textarea name="description" class="form-control" id="description" cols="30" rows="10">{!! old('description') !!}</textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            
          </div>
        </div><!-- col-4 -->
        
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
            <div class="col-6">
              
            </div>
            
          </div>
        </div><!-- col-4 -->
        <div class="col-lg-12">
          <div class="form-group">
            <label class="form-control-label">Status: </label>
            <input class=""  type="checkbox" {{ old('status') ==1 ? 'checked' : null }}  name="status" value="1">
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

@push('title','Product Add')
@push('js')

<script type="text/javascript" src="{{ asset('template') }}\lib\ckeditor\ckeditor.js"></script>
<script>
document.addEventListener( 'DOMContentLoaded',function()
{
 CKEDITOR.replace( 'description' ); 
});
</script>

<script src="{{ asset('template') }}/lib/select2/js/select2.full.min.js"></script>
<script>
$('.select2').select2();
</script>
@endpush
@push('css')

<link href="{{ asset('template') }}/lib/select2/css/select2.min.css" rel="stylesheet">

@endpush