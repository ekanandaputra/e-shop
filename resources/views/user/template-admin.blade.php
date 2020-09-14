<h3> Thankyou For Your Order </h3>

This is your invoice <br>

@foreach ($order as $dataOrder)
Order ID : {{ $dataOrder->order_id }} <br>
Date : {{ $dataOrder->order_date }} <br>
Address : {{ $dataOrder->address }} <br>
Total Price : {{ $dataOrder->total_price }} <br>
@endforeach
