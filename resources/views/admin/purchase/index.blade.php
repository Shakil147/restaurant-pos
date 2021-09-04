@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item text-capitalize" href="{{ route('admin.stocks.index') }}">stocks</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div>

<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4 class="text-capitalize">stocks List</h4>
    <p class="mg-b-0"></p>
  </div>
</div>

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <div class="col-6">
            
        <h6 class="br-section-label text-capitalize">stocks List</h6>
        <p class="br-section-text"></p>
      </div>
      <div class="col-6">
        <a href="{{ route('admin.stocks.create') }}" class="btn btn-primary float-right">Add New</a>
      </div>
    </div>
{{-- 
    <div class="bd bd-gray-300 rounded table-responsive">
      <table class="table mg-b-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Staus</th>
            <th class="text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @isset($stocks)
          @foreach($stocks as $key => $row)
          <tr>
            <th scope="row">{{ $key+1 }}</th>
            <th >{{ \Illuminate\Support\Str::limit($row->name, 25, $end='...') }}</th>
            <th >{{ $row->phone }}</th>
            <th >{{ $row->company }}</th>
            <td>@if($row->status==1) <p class="text-success">Active</p>
             @else <p class="text-danger">Deactivateed</p> @endif
           </td>
            <td class="text-center">
              <a href="{{ route('admin.stocks.edit',$row->id) }}"class="btn btn-outline-secondary btn-sm ml-2" >Edit</a>
              <a href="javascript:viod()" class="btn btn-outline-danger btn-sm ml-2" onclick="archiveFunction('{{ $row->id }}');">Delete</a>
              <form id="delete-form{{ $row->id }}" action="{{ route('admin.stocks.destroy',$row->id) }}" method="POST">@csrf </form>
            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
      </table>
    </div> --}}
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','Stocks List')
@push('js')


@endpush

@push('css')

@endpush