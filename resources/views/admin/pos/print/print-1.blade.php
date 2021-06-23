<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>POS Receipt Template Html Css</title>

{{-- <link rel="stylesheet" href="css/style.css"> --}}
<style>
	/*Downloaded from https://www.codeseek.co/Sambra22/pos-receipt-template-html-css-JNexJP */
#invoice-POS {
  box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
  padding: 2mm;
  margin: 0 auto;
  width: 44mm;
  background: #FFF;
}
#invoice-POS ::selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS ::moz-selection {
  background: #f31544;
  color: #FFF;
}
#invoice-POS h1 {
  font-size: 1.5em;
  color: #222;
}
#invoice-POS h2 {
  font-size: .9em;
}
#invoice-POS h3 {
  font-size: 1.2em;
  font-weight: 300;
  line-height: 2em;
}
#invoice-POS p {
  font-size: .7em;
  color: #666;
  line-height: 1.2em;
}
#invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot {
  /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
}
#invoice-POS #top {
  min-height: 100px;
}
#invoice-POS #mid {
  min-height: 80px;
}
#invoice-POS #bot {
  min-height: 50px;
}
#invoice-POS #top .logo {
  height: 60px;
  width: 60px;
  background: url({{ asset($web_info->logo) }}) no-repeat;
  background-size: 60px 60px;
}
#invoice-POS .clientlogo {
  float: left;
  height: 60px;
  width: 60px;
  background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
  background-size: 60px 60px;
  border-radius: 50px;
}
#invoice-POS .info {
  display: block;
  margin-left: 0;
}
#invoice-POS .title {
  float: right;
}
#invoice-POS .title p {
  text-align: right;
}
#invoice-POS table {
  width: 100%;
  border-collapse: collapse;
}
#invoice-POS .tabletitle {
  font-size: .5em;
  background: #EEE;
}
#invoice-POS .service {
  border-bottom: 1px solid #EEE;
}
#invoice-POS .item {
  width: 24mm;
}
#invoice-POS .itemtext {
  font-size: .5em;
}
#invoice-POS #legalcopy {
  margin-top: 5mm;
}
</style>
  
</head>

<body>

  
  <div id="invoice-POS">
    
    <center id="top">
      {{-- <div class="logo"></div> --}}
      <div class="info"> 
        <h2>{{ $web_info->name }}</h2>
      </div><!--End Info-->
    </center><!--End InvoiceTop-->
    
    <div id="mid">
      <div class="info">
        <h2>Order Info</h2>
        <p> 
            Date : {{ $order->created_at->format('d-M-y  H:i') }}</br>
            {{-- Address : {{ $web_info->address }}</br>
            Email   : {{ $web_info->email }}</br>
            Phone : {{ $web_info->phone }}</br> --}}
            Order Id : {{ $order->order_code }}</br>
           Customer : <b>{{ $order->name }}</b> 
           Sales Associate : {{ $order->user->name }}<br>
        </p>
      </div>
    </div><!--End Invoice Mid-->
    
    <div id="bot">
@isset($order)
		<div id="table">
			<table>
				<tr class="tabletitle">
					<td class="item"><h2>Item</h2></td>
					<td class="Hours"><h2>Qty</h2></td>
					<td class="Hours"><h2>Discount</h2></td>
					<td class="Rate"><h2>Sub Total</h2></td>
				</tr>
				@if(count($order->items))
				@foreach($order->items as $item)
				<tr class="service">
					<td class="tableitem"><p class="itemtext">{{ $item->product_name }}</p></td>
					<td class="tableitem"><p class="itemtext">{{ $item->quantity }}</p></td>
					<td class="tableitem"><p class="itemtext">{{ $item->discount }}{{ $item->discount_type =='percentage' ?'%' :null }}</p></td>
					<td class="tableitem"><p class="itemtext">{{ $item->price * $item->quantity }}</p></td>
				</tr>
				@endforeach
				@endif
        <tfoot>
          <tr>
              <th><small>Total Item(s):  </th>
              <th class="ir_txt_left"><small>{{ $order->total_item }}</small></small></th>
              <th></th>
              <th></th>
          </tr>
          <tr>
             <th><small>Sub Total</small></th>
              <th class="text-right"><small>{{ number_format($order->total,2) }} tk</small></th>
              <th></th>
              <th></th>
          </tr>
          <tr>
            <th><small>Grand Total</small></th>
              <th class="text-right">
                  <small>{{ number_format($order->grand_total,2) }} tk </small>                           
              </th>
              <th></th>
              <th></th>
          </tr>
          {{-- <tr>
            <th>Paid Amount</th>
              <th class="text-right">
                  {{ number_format($order->grand_total,2) }}  tk                            
              </th>
              <th></th>
              <th></th>
          </tr> --}}
      </tfoot>

			</table>
		</div><!--End Table-->
@endisset

		<div id="legalcopy">
			<p class="legal"><strong>Thank you for visiting us!</strong></p>
		</div>

	</div><!--End InvoiceBot-->
  </div><!--End Invoice-->
  
  

</body>

</html>