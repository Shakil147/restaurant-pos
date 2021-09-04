@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item text-capitalize" href="{{ route('admin.stocks.index') }}">stocks</a>
    <span class="breadcrumb-item active">Edit</span>
  </nav>
</div>
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4 class=" text-capitalize">stock Edit</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label  text-capitalize">stock Edit</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.stocks.index') }}" class="btn btn-primary float-right  text-capitalize">stock List</a>
      </dib>
    </div>
    <form action="{{ route('admin.stocks.update',$stock->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">
      </div><!-- row -->

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

@push('title','stock Edit')
@push('js')


@endpush
@push('css')

@endpush