<div class="row">
    <style>
        .btn-primary {
            background-color: #148def;
            outline: none;
            border:none !important;
        } 
     </style>
    <div class="col-6 offset-md-3">
        <div class="table-responsive">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title">All Coupons </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.add.coupon')}}" class="btn btn-primary float-end btn-sm pull-right" data-toggle="tooltip">Add Coupon </a>
                        </div>
                        @if(Session::has('success'))
                        <h4 class="success alert-success text-center">{{Session::get('success')}}</h4>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table shopping-summery table-stripe text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th> Id </th>
                                <th scope="col">Code</th>
                                <th scope="col">Type</th>
                                <th scope="col">Coupon value</th>
                                <th scope="col">Cart value</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($coupons as $data)
                        <tbody>
                            <td> {{$i++}}</td>
                            <td > {{$data->code}} </td>
                            <td> {{$data->type}} </td>
                            @if($data->coupon_value == 'fixed')
                            <td> ${{$data->coupon_value}} </td>
                            @else 
                            <td> {{$data->coupon_value}}% </td>
                            @endif
                            <td> {{$data->cart_value}} </td>
                            <td> <a href="{{route('admin.edit.coupon',[$data->id])}}"  class="btn btn-sm btn-primary"> Edit </a><a href="#" class="btn btn-sm btn" wire:click.prevent="DeleteCoupon({{$data->id}})"> Delete </a> </td>
                         </tbody>
                         @endforeach
                    </table>
                </div>
        </div>
    </div>
</div>