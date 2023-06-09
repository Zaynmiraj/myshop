<div style="padding:30px 0px">
    <div class="container">
        <div class="panel">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible"> {{Session::get('success')}}</div>
            @endif
            <div class="panel-heading">
                <div class="row">
                    <div class="col-6">
                        <p class="panel-title">Order status</p>
                    </div>
                    <div class="col-6">
                        <a href="{{route('user.orders')}}" class="btn float-end btn-small btn-primary">All Orders</a>
                        @if($order->status == 'orderd')
                        <a href="" wire:click.prevent="cancelled()" class="btn btn-danger btn-sm  float-end m-1">Cancelled</a>
                        @endif
                    </div>
                </div>
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
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    Product info 
                </div>

            </div>
            <div class="panel-body">
                <table class="table table-striped">

                    @foreach( $order->orderItems as $orderItem)
                        <tr>
                            <td> <img src="{{asset('assets/imgs/shop/product-')}}{{$orderItem->product->id}}-2.jpg" width="70px" height="70px" alt="" /> 
                            <td>{{$orderItem->product->name}}</td>
                            <td> {{$orderItem->product->sale_price}}</td>
                            <td>{{$orderItem->quantity * $orderItem->product->sale_price}}</td>
                            <td> {{$order->status}}</td>
                            <td>{{$orderItem->created_at}}</td>
                            @if($order->status == 'delivered' && $orderItem->rstatus == false)
                            <td> <a href="{{route('user.review',['order_item_id'=>$orderItem->id])}}"> Write a Review</a></td>
                            @endif
                        </tr>
                    @endforeach
                    
                </table>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Order Summary
                </div>
                <div class="panel-body">
                    <table class="table table-striped ">
                        <tr>
                            <td>Sub-Total</td>
                            <td> {{$order->subtotal}} </td>
                        </tr>
                        <tr>
                            <td> Tax </td>
                            <td> {{$order->tax}} </td>
                        </tr>
                        <tr>
                            <td>Shipping fee </td>
                            <td> {{$order->discount}} </td>
                        </tr>
                        <tr>
                            <td>Total </td>
                            <td> {{$order->total}} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Shipping address
            </div>
            <div class="panel-body">
                <table class="table table-striped">
                    <tr>
                        <td> Name </td>
                        <td> {{$order->first_name}} {{$order->last_name}} </td>
                    </tr>
                    <tr>
                        <td>Phone </td>
                        <td> {{$order->phone }} </td>
                    </tr>
                    <tr>
                        <td>Email </td>
                        <td> {{$order->email}} </td>
                    </tr>
                    <tr>
                        <td> Address 1 </td>
                        <td>{{$order->line_1}} </td>
                    </tr>
                    <tr>
                        <td> Address 2 </td>
                        <td> {{$order->line_2}} </td>
                    </tr>
                    <tr>
                        <td> State </td>
                        <td> {{$order->state}} </td>
                    </tr>
                    <tr>
                        <td>postal code </td>
                        <td> {{$order->zip_code }} </td>
                    </tr>
                    <tr> 
                        <td> City </td>
                        <td> {{$order->city}} </td>
                    </tr>
                    <tr>
                        <td> Country </td>
                        <td> {{$order->country}} </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel">
            <div class="panel-heading">
                Transaction Details 
            </div>
            <div class="panel-body">
                <table class="table table-striped ">
                    <tr> 
                        <td>Transaction method </td>
                        <td> {{$order->transaction->payment}} </td>
                    </tr>
                    <tr> 
                        <td>Status </td>
                        <td> {{$order->transaction->status}} </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    
</div>
