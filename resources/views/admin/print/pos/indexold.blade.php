@extends('admin.layouts.master')
@section('content')


{{-- <div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item" href="{{ route('admin.pos.index') }}">Products</a>
    <span class="breadcrumb-item active">List</span>
  </nav>
</div><!-- br-pageheader --> --}}

<div class="br-pagebody m-0 p-0">
  <div class="br-section-wrapper m-0 p-0">
    {{-- <div class="row">
      <dib class="col-6">
            
        <h6 class="br-section-label  mt-3 ml-3">Product Add</h6>
        <p class="br-section-text"></p>
      </dib>
      <dib class="col-6">
        <a href="{{ route('admin.products.index') }}" class="btn btn-primary float-right">Products List</a>
      </dib>
    </div> --}}
    <div class="row">
      <dib class="col-6 m-2 row">
            
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
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="text-center">Item</th>
                  <th class="text-center">Price</th>
                  <th class="text-center">Qty</th>
                  <th class="text-center">Discount</th>
                  <th class="text-center">Total</th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <td class="text-center">Item</td>
                  <td class="text-center">Price</td>
                  <td class="text-center">Qty</td>
                  <td class="text-center">Discount</td>
                  <td class="text-center">Total</td>
                </tr>

              </tbody>
            </table>
        </div><!-- col-12 -->
        
      </dib>

      <dib class="col-6 m-0 p-0 row">

          <div class="col-4">
            <div class="card" style="width: 100%;">
              <img src="http://localhost:8000/uploads/images/products/image1623581131.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
              </div>
            </div>
          </div>
          
          <div class="col-4">
            <div class="card" style="width: 100%;">
              <img src="http://localhost:8000/uploads/images/products/image1623581131.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
              </div>
            </div>
          </div>
          
          <div class="col-4">
            <div class="card" style="width: 100%;">
              <img src="http://localhost:8000/uploads/images/products/image1623581131.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
              </div>
            </div>
          </div>
          
          <div class="col-4">
            <div class="card" style="width: 100%;">
              <img src="http://localhost:8000/uploads/images/products/image1623581131.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
              </div>
            </div>
          </div>
          
          <div class="col-4">
            <div class="card" style="width: 100%;">
              <img src="http://localhost:8000/uploads/images/products/image1623581131.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
              </div>
            </div>
          </div>
        
        
      </dib>
    </div>
    
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','POS')

@push('js')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


@endpush
@push('css')


@endpush