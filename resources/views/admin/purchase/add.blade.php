@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item text-capitalize" href="{{ route('admin.stocks.index') }}">stocks</a>
    <span class="breadcrumb-item active">Add</span>
  </nav>
</div>
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4 class="text-capitalize">stock Add</h4>
    <p class="mg-b-0"></p>
  </div>
</div>
<stock-in></stock-in>

@endsection

@push('title','stock Edit')
@push('js')


@endpush
@push('css')

@endpush