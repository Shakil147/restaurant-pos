@extends('admin.layouts.master')
@section('content')


<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item" href="{{ route('admin.orders.index') }}">Orders</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Orders List</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<orders-list></orders-list>

@endsection

@push('title','Orders List')

@push('js')

@endpush
@push('css')

@endpush