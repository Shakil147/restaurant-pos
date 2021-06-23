@extends('admin.layouts.master')
@section('content')


<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="index.html">Bracket</a>
    <a class="breadcrumb-item" href="#">Manufacturers</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="icon ion-ios-gear-outline"></i>
  <div>
    <h4>Manufacturers List</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <div class="col-6">
            
        <h6 class="br-section-label">Manufacturers List</h6>
        <p class="br-section-text"></p>
      </div>
      <div class="col-6">
        <a href="" class="btn btn-primary float-right">Add New</a>
      </div>
    </div>

          <div class="bd bd-gray-300 rounded table-responsive">
            <table class="table mg-b-0">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Staus</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <th >image</th>
                  <td>Tiger Nixon</td>
                  <td>active</td>
                  <td class="text-center">
                    <a href="" class="ml-2">View</a>
                    <a href="" class="ml-2">Edit</a>
                    <a href="" class="ml-2">delete</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div><!-- bd -->

  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','Manufacturers List')
@push('js')

<script>
  $(function(){
    'use strict'

    // FOR DEMO ONLY
    // menu collapsed by default during first page load or refresh with screen
    // having a size between 992px and 1299px. This is intended on this page only
    // for better viewing of widgets demo.
    $(window).resize(function(){
      minimizeMenu();
    });

    minimizeMenu();

    function minimizeMenu() {
      if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
        // show only the icons and hide left menu label by default
        $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
        $('body').addClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideUp();
      } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
        $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
        $('body').removeClass('collapsed-menu');
        $('.show-sub + .br-menu-sub').slideDown();
      }
    }
  });
</script>

@endpush
@push('css')

@endpush