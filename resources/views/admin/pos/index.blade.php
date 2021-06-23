@extends('admin.layouts.master')
@section('content')


<div class="br-pagebody m-0 p-0" >
  <div class="br-section-wrapper m-0 p-0">
    <div class="row" style="margin:0!important">
      @php
      $items = Cart::getContent();
      @endphp
      <cart-list :data="{{ $items }}"></cart-list>

      {{-- product start --}}
      <pos-product-list></pos-product-list>

    </div>
  </div><!-- br-section-wrapper -->
</div><!-- br-pagebody -->
@endsection

@push('title','POS')

@push('js')

<script>
function addToCart(id) {
  event.preventDefault(); // prevent form submit
  // $('#data'+id).css("display", "none");
  document.getElementById(id).submit();
}

</script>

@endpush
@push('css')
<style>
.item-boxes{
  max-height:340px;
  min-height:340px;
  overflow-y:scroll;
  width:100%;
  float:left;
}
.card-boxes{
  height:500px;
  overflow-y:scroll;
  width:100%;
  float:left;
}
.card-boxes .card{
  margin:10px 0;
}

</style>

@endpush