@extends('admin.layouts.master')
@section('content')

<div class="br-pageheader">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('admin.home') }}">{{ config('app.name', 'Laravel') }}</a>
    <a class="breadcrumb-item" href="{{ route('admin.roles.index') }}">Roles</a>
    <span class="breadcrumb-item active">Edit</span>
  </nav>
</div><!-- br-pageheader -->
<div class="br-pagetitle">
  <i class="icon ion-ios-gear-outline"></i>
  <div>
    <h4>Admins Edit</h4>
    <p class="mg-b-0"></p>
  </div>
</div><!-- d-flex -->
<div class="br-pagebody">
  <div class="br-section-wrapper">
    <div class="row">
      <div class="col-6">
            
        <h6 class="br-section-label">Admin Edit</h6>
        <p class="br-section-text"></p>
      </div>
      <div class="col-6">
       <a href="{{ route('admin.roles.index') }}" class="btn btn-primary float-right">Role List</a>
      </div>
    </div>
    <form  action="{{ route('admin.roles.update',$role->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="form-layout form-layout-1">
      <div class="row mg-b-25">

            <div class="col-lg-12">
              <div class="form-group">
                <label class="form-control-label"><h3 class="text-dark text-capitalize">Name: <span class="tx-danger">*</span> </h3></label>
                <input class="form-control" type="text" name="name"  placeholder="Enter Name" value="{{ $role->name }}" disabled required>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div><!-- col-4 -->
           <div class="col-12  p-3">
             <h3 class="text-dark text-capitalize">Select permissions for this role</h3>
           </div>
            @isset($permissions)
            @foreach($permissions as $key=> $permission)
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="form-group">    

                  <input  type="checkbox"  name="permissions[]"value="{{ $permission->name }}"  @if($role->name !== 'super-admin') {{ $role->hasPermissionTo($permission->name) ? 'checked' : null }} @else checked disabled @endif>   
                  <label class="text-capitalize"> {{ Str::replaceArray('-', [' '], $permission->name) }} </label>             
              </div>
            </div><!-- col-12 -->
            
            @endforeach
            @endisset

            <div class="col-12"></div>
        
        
      <div class="form-layout-footer">
        <button class="btn btn-secondary" type="reset">Reset</button>@if($role->name !== 'super-admin')
        <button class="btn btn-outline-success" name="submit" value="s&c" type="submit">Save And Continue</button>
        <button class="btn btn-outline-success" name="submit" value="save" type="submit">Save</button>
        @endif
      </div><!-- form-layout-footer -->
    </div><!-- form-layout -->
    </form>
  </div><!-- br-section-wrapper -->
  </div>
</div><!-- br-pagebody -->
@endsection

@push('title','Role Add')
@push('js')

@endpush
@push('css')

@endpush