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
                    <h3> All Orders </h3>
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
                            </tr>
                        </thead>
                        @foreach($orders as $order)
                        <tbody>
                            <td> {{$order->first_name}} {{$order->last_name}}</td>
                            <td> {{$order->email}}</td>
                            <td> {{$order->phone}}</td>
                            <td> {{$order->status}}</td>
                            <td> {{$order->total}}</td>
                            <td> {{$order->created_at}}</td>
                            <td> <a href="{{route('user.orders.show',['order_id'=>$order->id])}}" class="btn btn-sm btn-primary"> Details </a> </td>
                         </tbody>
                         @endforeach
                    </table>
                </div>
        </div>
    </div>
</div>