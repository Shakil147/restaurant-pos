<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        {{-- <link rel="stylesheet" href="style.css"> --}}
        <title>Receipt example</title>
        <style>
        	* {
    font-size: 12px;
    font-family: 'Times New Roman';
}

td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
    /*border: 1px solid black;*/
}
td.quantity,
th.quantity {
    width: 25px;
    max-width: 25px;
    word-break: break-all;
}

td.description,
th.description {
    width: 80px;
    max-width: 80px;
}


td.price,
th.price {
    width: 74px;
    max-width:74px;
    word-break: break-all;
    text-align: right;
}
.summary{
    text-align: left;
    width: 100px;
}
.summary-price{
    text-align: right;
    width: 100px;
}

.centered {
    text-align: center;
    align-content: center;
}

.ticket {
    width: 155px;
    max-width: 155px;
}

img {
    max-width: inherit;
    width: inherit;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
}
        </style>
    </head>
    <body>
        <div class="ticket">
            {{-- <img src="{{ asset('uploads/logo.png') }}" class="logo" alt="Logo"> --}}
            <p class="centered">{{ $web_info->name }}
              <br>{{ $web_info->address }}
              <br>{{ $web_info->phone }}
            </p>

            <p class="centered">Date : {{ $order->created_at->format('d-M-y  H:i') }}
              <br>Order Id : {{ $order->order_code }}
              <br>Customer : {{ $order->name }}
              {{-- <br>Sales Associate : {{ $order->user->name }} --}}
            </p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Name</th>
                        <th class="price">Tk.</th>
                    </tr>
                </thead>
                <tbody>

					@if(count($order->items))
					@foreach($order->items as $item)
                    <tr>
                        <td class="quantity">{{ $item->quantity }}</td>
                        <td class="description">{{ $item->product_name }}</td>
                        <td class="price">{{ number_format($item->price * $item->quantity,2) }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
            <table>
                <tbody>
                    <tr>
                        <td class="summary">Total Item(s):</td>
                        <td class="summary-price">{{ $order->total_item }}</td>
                    </tr>
                    <tr>
                        
                        <td class="summary">Sub Total</td>
                        <td class="summary-price">{{ number_format($order->total,2) }}</td>
                    </tr>
                    <tr>
                        <td class="summary">Total Discount </td>
                        <td class="summary-price">{{ $order->discount }}</td>
                    </tr>
                    <tr>                        
                        <td class="summary">Grand Total :</td>
                        <td class="summary-price">{{ number_format($order->grand_total,2) }}</td>
                    </tr>
                    <tr>                        
                        <td class="summary">Paid :</td>
                        <td class="summary-price">{{ number_format($order->collected,2) }}</td>
                    </tr>
                    <tr>                        
                        @php
                        $change =$order->collected - $order->grand_total;
                        @endphp

                        @if ($change < 0):
                        <td class="summary">Change :</td>
                        <td class="summary-price">{{ number_format(abs($change),2) }}</td>
                        @else

                        <td class="summary">Due :</td>
                        <td class="summary-price">{{ number_format(abs($change),2) }}</td>

                        @endif
                    </tr>
                </tbody>
            </table>
            <p class="centered">Thanks for your purchase!
                <br>{{ $web_info->name }}</p>
        </div>
        <button id="btnPrint" class="hidden-print">Print</button>
       {{--  <script src="script.js"></script> --}}
        <script>
        	const $btnPrint = document.querySelector("#btnPrint");
					$btnPrint.addEventListener("click", () => {
					    window.print();
					});
        </script>	
    </body>
</html>