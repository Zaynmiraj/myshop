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
                            <h3 class="card-title">Categories </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.category.add')}}" class="btn btn-primary float-end btn-sm pull-right" data-toggle="tooltip">Add Category </a>
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
                                <th scope="col">Name</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @php
                            $i = ($datas->currentPage()-1)* $datas->perPage();
                        @endphp
                        @foreach($datas as $data)
                        <tbody>
                            <td> {{++$i}}</td>
                            <td > {{$data->name}} </td>
                            <td> {{$data->slug}} </td>
                            <td> <a href="{{route('admin.category.edit',[$data->id])}}"  class="btn btn-sm btn-primary"> Edit </a><a href="#" class="btn btn-sm btn" wire:click.prevent="CategoryDelete({{$data->id}})"> Delete </a> </td>
                         </tbody>
                         @endforeach
                    </table>
                </div>
        </div>
    </div>
</div>