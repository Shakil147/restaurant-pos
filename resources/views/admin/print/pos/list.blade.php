@extends('admin.layouts.master')
@section('content')


<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item" href="{{ route('admin.products.index') }}">Products</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="fa fa-industry" aria-hidden="true"></i>
  <div>
    <h4>Products List</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <div class="col-6">
        <h6 class="br-section-label">Products List</h6>
        <p class="br-section-text"></p>
      </div>
      <div class="col-6">
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-right">Add New</a>
      </div>
    </div>

          <div  class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @isset($products)
                @foreach($products as $key => $row)
                <tr>
                  <th scope="row">{{ $key+1 }}</th>
                  <th > @if($row->image)<img src="{{ asset($row->image) }}" width="80" alt=""> @endif</th>
                  <th >{{ $row->name }}</th>
                  <th >
                    @if(count($row->categories)>0)
                    {{ implode(', ',$row->categories->pluck('name')->toArray(),)  }} 
                    @else
                    
                    @endif
                  </th>
                  <td>{{ $row->created_at->format('d M Y') }}</td>
                  <td>@if($row->status==1) <p class="text-success">Active</p>
                   @else <p class="text-danger">Deactivateed</p> @endif
                 </td>
                  <td class="text-center">
                    <a href="{{ route('admin.products.edit',$row->id) }}"  class="btn btn-outline-secondary btn-sm ml-2">Edit</a>
                    <a href="javascript:viod()"  class="btn btn-outline-danger btn-sm ml-2" onclick="archiveFunction('{{ $row->id }}');">Delete</a>
                    <form id="delete-form{{ $row->id }}" action="{{ route('admin.products.destroy',$row->id) }}" method="POST">@csrf </form>
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

@push('title','Products List')

@push('js')
<script src="{{ asset('template') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('template') }}/lib/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/lib/datatables.net-dt/js/dataTables.dataTables.min.js"></script>
    <script src="{{ asset('template') }}/lib/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('template') }}/lib/datatables.net-responsive-dt/js/responsive.dataTables.min.js"></script>
    <script>
      $(function(){
        'use strict';

        $('#datatable1').DataTable({
          responsive: true,
          language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
          }
        });

        $('#datatable2').DataTable({
          bLengthChange: false,
          searching: false,
          responsive: true
        });

        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

      });
    </script>

<script>
    function archiveFunction(id) {
        event.preventDefault(); // prevent form submit
        // $('#data'+id).css("display", "none");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                 document.getElementById('delete-form'+id).submit();
            }
        })
    }

</script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@endpush
@push('css')

    <link href="{{ asset('template') }}/lib/datatables.net-dt/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('template') }}/lib/datatables.net-responsive-dt/css/responsive.dataTables.min.css" rel="stylesheet">

@endpush