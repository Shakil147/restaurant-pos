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
}

td.description,
th.description {
    width: 75px;
    max-width: 75px;
}

td.quantity,
th.quantity {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
}

td.price,
th.price {
    width: 40px;
    max-width: 40px;
    word-break: break-all;
    text-align: right;
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
           {{--  <img src="./logo.png" alt="Logo"> --}}
            <p class="centered">{{ $web_info->name }}
              <br>{{ $web_info->address }}
              <br>{{ $web_info->phone }}
            </p>

            <p class="centered">Date : {{ $order->created_at->format('d-M-y  H:i') }}
              <br>Order Id : {{ $order->order_code }}
              <br>Customer : {{ $order->name }}
              <br>Sales Associate : {{ $order->user->name }}
            </p>
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Name</th>
                        {{-- <th class="quantity">Discount</th> --}}
                        <th class="price">Tk.</th>
                    </tr>
                </thead>
                <tbody>

					@if(count($order->items))
					@foreach($order->items as $item)
                    <tr>
                        <td class="quantity">{{ $item->quantity }}</td>
                        <td class="description">{{ $item->product_name }}</td>
                        {{-- <td class="price">{{ $item->discount }}{{ $item->discount_type =='percentage' ?'%' :null }}</td> --}}
                        <td class="price">{{ number_format($item->price * $item->quantity,2) }}</td>
                    </tr>
                    @endforeach
                    @endif
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">Total Item(s):</td>
                        <td class="price">{{ $order->total_item }}</td>
                    </tr>
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">Sub Total</td>
                        <td class="price">{{ number_format($order->total,2) }}</td>
                    </tr>
                    {{-- <tr>
                        <td class="quantity"></td>
                        <td class="description">Vat (0%)</td>
                        <td class="price">0</td>
                    </tr> --}}
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">Total Discount </td>
                        <td class="price">{{ $order->discount }}</td>
                    </tr>
                    {{-- <tr>
                        <td class="quantity"></td>
                        <td class="description">Servise charge</td>
                        <td class="price">0</td>
                    </tr> --}}
                    <tr>
                        <td class="quantity"></td>
                        <td class="description">Payable : </td>
                        <td class="price">{{ number_format($order->grand_total,2) }}</td>
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