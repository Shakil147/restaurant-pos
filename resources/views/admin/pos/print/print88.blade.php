
<html><head>
    <meta charset="utf-8">
    <title>Invoice {{ $order->order_code }}</title>
<style>
	body {
  color: #000;
}

#wrapper {
  margin: 0 auto;
  padding-top: 20px;
}

.btn {
  border-radius: 0;
  margin-bottom: 5px;
}

.bootbox .modal-footer {
  border-top: 0;
  text-align: center;
}

h3 {
  margin: 5px 0;
}

.order_barcodes img {
  float: none !important;
  margin-top: 5px;
}
.ir_txt_center {
  text-align: center !important;
}
.ir_wid_70 {
  width: 70%; !important;
}
@media print {
  .no-print {
    display: none;
  }

  #wrapper {
    margin: 0 auto;
  }

  .no-border {
    border: none !important;
  }

  .border-bottom {
    border-bottom: 1px solid #ddd !important;
  }

  table tfoot {
    display: table-row-group;
  }
  .ir_txt_center {
    text-align: center !important;
  }
  .ir_txt_right {
    text-align: right !important;
  }
  .ir_wid_70 {
    width: 70%; !important;
  }
}

#wrapper {
    max-width: 480px;
}
.text-right{
    width: 50% !important;
}

@media print {
   #wrapper {
        max-width: 480px;
    }
    .text-right{
        width: 50% !important;
    }
}
.btn-block {
    display: block;
    width: 100%;
}
</style>
</head>

<body cz-shortcut-listen="true">
    <div id="wrapper">
        <div id="receiptData">

            <div id="receipt-data">
                <di class="row">
                    <div class="text-center">
                    <img src="{{ asset($web_info->logo) }}">
                    <h3>{{ $web_info->name }}</h3>
                    <p>{{ $web_info->address }}<br>
                       Phone : {{ $web_info->phone }}<br>
                       {{--  Table No:C 000011<br> --}}
                    </p>
                    <div class="text-center">
                    <p>Date :{{ $order->created_at->format('d-M-y  H:i') }}<br>
                        Sales Associate : {{ $order->user->name }}<br>
                        Customer : <b>{{ $order->name }}</b> <br>                                                      
                        Order Id : <b>{{ $order->order_code }}</b>                                                       
                        </p>
                </div>
                </di>
                
               
                <div class="ir_clear"></div>
                <table class="table table-condensed">
                    <tbody>
                        @if(count($order->items))
                        @foreach($order->items as $key=> $item)
                        <tr>
                            <td class="no-border border-bottom ir_wid_70"># {{ $key+1 }}:
                                &nbsp;&nbsp;{{ $item->product_name }} ({{ $item->product_id }})<small></small> {{ $item->quantity }} X {{ $item->price }}</td>
                                {{-- {{ $item->discount_type =='percentage' ?'%' :null }} --}}
                            <td class="no-border border-bottom text-right">{{ number_format($item->quantity *$item->price, 2) }} tk</td>
                        </tr>
                        @endforeach
                        @endif
                                                
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Total Item(s): {{ $order->total_item }}</th>
                            <th class="ir_txt_left"></th>
                        </tr>
                        <tr>
                           <th>Sub Total</th>
                            <th class="text-right">{{ number_format($order->total,2) }} tk</th>
                        </tr>
                        <tr>
                          <th>Grand Total</th>
                            <th class="text-right">
                                {{ number_format($order->grand_total,2) }} tk                            
                            </th>
                        </tr>
                        {{-- <tr>
                          <th>Paid Amount</th>
                            <th class="text-right">
                                {{ number_format($order->grand_total,2) }}  tk                            
                            </th>
                        </tr> --}}
                    </tfoot>
                </table>
                <table class="table table-striped table-condensed">
                    <tbody>
                        <tr>
                            <td>Total Payable</td>
                            <td class="text-right">{{ number_format($order->grand_total,2) }} tk</td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center"> Thank you for visiting us!</p>

            </div>
            <div class="ir_clear"></div>
        </div>

        <div id="buttons" class="no-print ir_pt_tr">
            <hr>
            <span class="pull-right col-xs-12">
                <button onclick="window.print();" class="btn btn-primary btn-flex">Print</button> </span>
            <div class="ir_clear"></div>
        </div>
    </div>
<script src="{{ asset('template') }}/lib/jquery/jquery.min.js"></script>
<script src="{{ asset('template') }}/lib/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>