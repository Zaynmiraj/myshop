<div style="padding:30px 0px">
    <div class="container">
        <div class="panel">
            <div class="panel-heading">
                Order status
            </div>
            <div class="panel-body">
                <table class="table table-striped ">
                    <tr>
                        <th> Order Id </th>
                        <td> {{$order->id}}
                        <th> Order Date </th>
                        <td> {{$order->created_at}}
                        <th>Status </th>
                        <td> {{$order->status}} </td>
                        @if($order->status == 'delivered')
                        <th> delivered date</th>
                        <td> {{$order->delivery_date}}</td>
                        @elseif($order->status == 'canceled')
                        <th> canceled date </th>
                        <td> {{$order->canceled_date}}</td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Items
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                            <tr>
                                <td class="image product-thumbnail"><img src="{{asset('assets/imgs/shop/product-')}}{{$item->product->id}}-2.jpg" alt="#"></td>
                                <td class="product-des product-name">
                                    <h5 class="product-name"><a href="product-details.html"> {{$item->product->name}} </a></h5>
                                </td>
                                <td class="price" data-title="Price"><span> {{$item->product->sale_price}} </span></td>
                                <td class="price" data-title="Price"><span> {{$item->quantity}} </span></td>
                                <td class="price" data-title="Price"><span> {{$item->product->sale_price * $item->quantity}} </span></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>   
                
            </div>
            <div class="summary">
                <div class="order_summary">
                    <h4 class="title-box">Order summary</h4>
                    <table class="table table-striped ">
                        <tr>
                            <td>Subtotal</td>
                            <td>{{$order->subtotal}}</td>
                        </tr>
                        <tr>
                            <td>Tax </td>
                            <td>{{$order->tax}}</td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td> Free delivery</td>
                        </tr>
                        <tr>
                            <td>Total </td>
                            <td>{{$order->total}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Adress
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                        <tr>
                            <td>Name </td>
                            <td>{{$order->first_name}} {{$order->last_name}}</td>
                        </tr>
                        <tr>
                            <td> Eamil </td>
                            <td>{{$order->email}}</td>
                        </tr>
                        <tr>
                            <td>Phone </td>
                            <td>{{$order->phone}}</td>
                        </tr>
                        <tr>
                            <td> Address 1 </td>
                            <td>{{$order->line_1}}</td>
                        </tr>
                        <tr>
                            <td>Adress 2 </td>
                            <td>{{$order->line_2}}</td>
                        </tr>
                        <tr>
                            <td> state </td>
                            <td>{{$order->state}}</td>
                        </tr>
                        <tr>
                            <td>City </td>
                            <td>{{$order->city}}</td>
                        </tr>

                        <tr>
                            <td>Zip coe </td>
                            <td>{{$order->zip_code}}</td>
                        </tr>
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Transaction
            </div>
            <div class="panel-body">
                <table class="table table-striped ">
                    <tr>
                        <td> Method </td>
                        <td> {{$order->transaction->payment}}</td>
                    </tr>
                    <tr>
                        <td> status </td>
                        <td> {{$order->transaction->status}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
