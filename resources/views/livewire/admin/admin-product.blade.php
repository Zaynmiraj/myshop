<div class="row">
    <style>
        .btn-primary {
            background-color: #148def;
            outline: none;
            border:none !important;
        } 
     </style>
    <div class="col-12">
        <div class="table-responsive">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h3 class="card-title"> All Products {{$products->total()}} </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.product.add')}}" class="btn btn-primary float-end btn-sm pull-right" data-toggle="tooltip">Add Product </a>
                        </div>
                        @if(Session::has('success'))
                        <h4 class="success alert-success text-center">{{Session::get('success')}}</h4>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <table class="table shopping-summery text-center clean">
                        <thead>
                            <tr class="main-heading">
                                <th> Id </th>
                                <th> Iamge </th>
                                <th> Name </th>
                                <th> Price </th>
                                <th> Categories </th>
                                <th> Quantity </th>
                                <th> Date </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        @php
                            $i = ($products->currentPage()-1)* $products->perPage();
                        @endphp
                        @foreach($products as $data)
                        <tbody>
                            <td> {{++$i}}</td>
                            <td><img src="{{asset('assets/imgs/products')}}/{{$data->image}}" class="img" /></td>
                            <td > {{$data->name}} </td>
                            <td> {{$data->sale_price}} </td>
                            <td> {{$data->category->name}} </td>
                            <td> {{$data->quantity}} </td>
                            <td> {{$data->created_at}} </td>
                            <td> {{$data->stock_status}} </td>
                            <td> <a href="{{route('admin.product.edit',[$data->id])}}"  class="btn btn-sm btn-primary"> Edit </a><a href="#" class="btn btn-sm btn" wire:click.prevent="deleteProduct({{$data->id}})"> Delete </a> </td>
                         </tbody>
                         @endforeach
                    </table>
                    {{$products->links()}}
                </div>
        </div>
    </div>
</div>