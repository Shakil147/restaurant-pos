@extends('admin.layouts.master')
@section('content')
<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item" href="{{ route('admin.roles.index') }}">Roles</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="icon ion-ios-gear-outline"></i>
  <div>
    <h4>Roles List</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->


       
      <admin-role-list ></admin-role-list>    


<!-- br-pagebody -->
@endsection

@push('title','Roles List')
@push('js')


@endpush
@push('css')

@endpush