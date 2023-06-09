<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <p> Hi, {{$order->first_name}} {{$order->last_name}} </p>
        <table> 
            @foreach($order->orderItems as $orderItem)
            <tr>
                <td> <img src="{{asset('assets/imgs/shop/product-')}}{{$orderItem->product->id}}-2.jpg" width="100px" height="100px" alt=""> </td>
                <td> {{$orderItem->product->name}} </td>
                <td> {{$orderItem->quanity}} </td>
                <td> {{$orderItem->product->sale_price}}</td>
            </tr>
            @endforeach
            <tr>
                <td> Sub-total </td>
                <td> {{$order->subtotal}}</td>
            </tr>
            <tr>
                <td> Tax </td>
                <td> {{$order->tax}}</td>
            </tr>
            <tr>
                <td> Shipping </td>
                <td> {{$order->shipping}}</td>
            </tr>
            <tr>
                <td> Total </td>
                <td> {{$order->total}}</td>
            </tr>
        </table>


                 
</body>
</html>