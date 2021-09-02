@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item text-capitalize" href="{{ route('admin.items.index') }}">items</a>
    <span class="breadcrumb-item active">Add</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4 class="text-capitalize">item Add</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label text-capitalize">item Add</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.items.index') }}" class="btn btn-primary float-right text-capitalize">item List</a>
      </dib>
    </div>
    <form action="{{ route('admin.items.store') }}" method="POST" encitem="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
        <div class="col-lg-12">
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
        <div class="col-md-6">
          <div class="form-group">
              <label class="form-control-label text-capitalize">type: <span class="tx-danger">*</span></label>
            <select name="type_id" id="type_id" class="form-control">
              @foreach($types as $key => $type)
              <option value="{{ $type->id }}" @if(old('type_id')==$type->id) selected @endif>{{ $type->name }}</option>
              @endforeach
            </select>
            @error('type_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
              <label class="form-control-label text-capitalize">Unit: <span class="tx-danger">*</span></label>
            <select name="unit_id" id="unit_id" class="form-control">
              @foreach($units as $key => $unit)
              <option value="{{ $unit->id }}" @if(old('unit_id')==$unit->id) selected @endif>{{ $unit->name }}</option>
              @endforeach
            </select>
            @error('unit_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label class="form-control-label text-capitalize">purchase price: <span class="tx-danger">*</span></label>
              <input type="number"  step="any" name="purchase_price" class="form-control" value="{{ old('purchase_price') }}" required>
            @error('purchase_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label class="form-control-label text-capitalize">selling price: <span class="tx-danger">*</span></label>
              <input type="number"  step="any" name="selling_price" class="form-control" value="{{ old('selling_price') }}" required>
            @error('selling_price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
              <label class="form-control-label text-capitalize">sku: <span class="tx-danger">*</span></label>
              <input type="text" name="sku" class="form-control" value="{{ old('sku') }}">
            @error('sku')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="col-lg-12">
          <div class="form-group">
              <label class="form-control-label text-capitalize">description: <span class="tx-danger">*</span></label>
            <textarea class="form-control " name="description" id="description" rows="6">{!! old('description') !!}</textarea>

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror         
          </div>
        </div>

        <div class="col-lg-12">
          <div class="form-group row">
            <div class="col-6">
              <label class="form-control-label text-capitalize">Image: <span class="tx-danger">*</span></label>
            <input class="" type="file" name="image" value="" placeholder="Enter Image"  accept="image/x-png,image/gif,image/jpeg" >  
            @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>            
          </div>
        </div>
        <div class="col-lg-6">
          <div class="form-group">
            <label class="form-control-label">Status: </label>
            <input class=""  type="checkbox" {{ old('status') == 1 ? 'checked' : null }} name="status" value="1">
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
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

@push('title','Item Add')
@push('js')


@endpush
@push('css')

@endpush