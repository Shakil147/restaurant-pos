@extends('admin.layouts.master')
@section('content')


<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item" href="{{ route('admin.categories.index') }}">Categories</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Categories List</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <div class="col-6">
            
        <h6 class="br-section-label">Categories List</h6>
        <p class="br-section-text"></p>
      </div>
      <div class="col-6">
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary float-right">Add New</a>
      </div>
    </div>

          <div class="bd bd-gray-300 rounded table-responsive">
            <table class="table mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Date</th>
                  <th>Staus</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @isset($categories)
                @foreach($categories as $key => $row)
                <tr>
                  <th scope="row">{{ $key+1 }}</th>
                  <th ><img src="{{ $row->image ? asset($row->image) : asset('/uploads/blank.png') }}" width="40" alt="" class="img-thumbnail"></th>
                  <th >{{ \Illuminate\Support\Str::limit($row->name, 25, $end='...') }}</th>
                  <td>{{ $row->created_at->format('d M Y') }}</td>
                  <td>@if($row->status==1) <p class="text-success">Active</p>
                   @else <p class="text-danger">Deactivateed</p> @endif
                 </td>
                  <td class="text-center">
                    <a href="{{ route('admin.categories.edit',$row->id) }}"class="btn btn-outline-secondary btn-sm ml-2" >Edit</a>
                    <a href="javascript:viod()" class="btn btn-outline-danger btn-sm ml-2" onclick="archiveFunction('{{ $row->id }}');">Delete</a>
                    <form id="delete-form{{ $row->id }}" action="{{ route('admin.categories.destroy',$row->id) }}" method="POST">@csrf </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div><!-- bd -->

  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','Category List')
@push('js')


@endpush

@push('css')

@endpush