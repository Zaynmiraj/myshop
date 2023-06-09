<div class="row">
    <style>
        .btn-primary {
            background-color: #148def;
            outline: none;
            border:none !important;
        } 
     </style>
    <div class="col-12 ">
        <div class="table-responsive">
            <div class="card">
                <div class="card-header">
                    <h3> All Orders - {{$orders->total()}} </h3>
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert"> {{session()->get('success') }}</div>
                    @endif
                </div>
                <div class="card-body">
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <td> Name </td>
                                <td> Email </td>
                                <td> Phone </td>
                                <td> Status </td>
                                <td> Total </td>
                                <td> Date </td>
                                <td> Action </td>
                                <td colspan="2" class="text-center">Status Update </td>
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                       @if($order->status == 'canceled')
                       <tbody class="bg-danger text-white">
                        <td> {{$order->first_name}} {{$order->last_name}}</td>
                        <td> {{$order->email}}</td>
                        <td> {{$order->phone}}</td>
                        <td> {{$order->status}}</td>
                        <td> {{$order->total}}</td>
                        <td> {{$order->created_at}}</td>
                        <td> <a href="{{route('admin.order.details',['order_id'=>$order->id])}}" class="btn btn-sm btn-primary"> Details </a>
                         </td>
                         <td> 
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Status <span class="caret"></span></button>
                                <ul class="dropdown-menu" id="dropdown">
                                    <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'delivered')"> Delivered</a></li>
                                    <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'canceled')"> Canceled</a></li>
                                </ul>
                            </div>
                         </td>
                     </tbody>
                       @elseif($order->status == 'delivered')
                       <tbody class="bg-primary text-white">
                        <td> {{$order->first_name}} {{$order->last_name}}</td>
                        <td> {{$order->email}}</td>
                        <td> {{$order->phone}}</td>
                        <td> {{$order->status}}</td>
                        <td> {{$order->total}}</td>
                        <td> {{$order->created_at}}</td>
                        <td> <a href="{{route('admin.order.details',['order_id'=>$order->id])}}" class="btn btn-sm btn-primary"> Details </a>
                         </td>
                         <td> 
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Status <span class="caret"></span></button>
                                <ul class="dropdown-menu" id="dropdown">
                                    <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'delivered')"> Delivered</a></li>
                                    <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'canceled')"> Canceled</a></li>
                                </ul>
                            </div>
                         </td>
                     </tbody>
                     @else
                     <tbody class="bg-info text-white">
                        <td> {{$order->first_name}} {{$order->last_name}}</td>
                        <td> {{$order->email}}</td>
                        <td> {{$order->phone}}</td>
                        <td> {{$order->status}}</td>
                        <td> {{$order->total}}</td>
                        <td> {{$order->created_at}}</td>
                        <td> <a href="{{route('admin.order.details',['order_id'=>$order->id])}}" class="btn btn-sm btn-primary"> Details </a>
                         </td>
                         <td> 
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-bs-toggle="dropdown">Status <span class="caret"></span></button>
                                <ul class="dropdown-menu" id="dropdown">
                                    <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'delivered')"> Delivered</a></li>
                                    <li><a href="" class="dropdown-item" wire:click.prevent="updateStatus({{$order->id}},'canceled')"> Canceled</a></li>
                                </ul>
                            </div>
                         </td>
                     </tbody>
                     @endif
                         @endforeach
                    </table>
                </div>
        </div>
    </div>
</div>