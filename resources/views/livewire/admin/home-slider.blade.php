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
                            <h3 class="card-title"> All Home slider </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.add.slider')}}" class="btn btn-primary float-end btn-sm pull-right" data-toggle="tooltip">Add New Slider </a>
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
                                <th> image </th>
                                <th> Top title </th>
                                <th> Title </th>
                                <th> Sub title </th>
                                <th> link </th>
                                <th> offer </th>
                                <th> Status </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        @php
                            $i = 1;
                        @endphp
                        @foreach($slider as $data)
                        <tbody>
                            <td> {{$i++}}</td>
                            <td><img src="{{asset('assets/imgs/slider')}}/{{$data->image}}" class="img" /></td>
                            <td > {{$data->top_title}} </td>
                            <td> {{$data->title}} </td>
                            <td> {{$data->sub_title}} </td>
                            <td> {{$data->link}} </td>
                            <td> {{$data->offer}} </td>
                            <td> {{$data->status == 1 ? 'active' : 'inactive'}} </td>
                            <td> <a href="{{route('admin.add.slider.edit',[$data->id])}}"  class="btn btn-sm btn-primary"> Edit </a><a href="#" class="btn btn-sm btn" wire:click.prevent="SliderDelete({{$data->id}})"> Delete </a> </td>
                         </tbody>
                         @endforeach
                    </table>
                    {{$slider->links()}}
                </div>
        </div>
    </div>
</div>