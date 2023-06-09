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
                            <h3 class="card-title"> Edit category </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.category')}}" class="btn float-end btn-primary btn-sm pull-right">All Categories</a>
                        </div>
                        @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('success')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
        
                        </div>
                        @endif
                </div>
                <div class="card-body">
                    <form wire:click.prevent="EditCategory()">
                        <label>Name</label>
                        <input type="text" class="form-control" value="{{$name}}" wire:model="name" wire:keyup="MakeSlug" name="name">
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br/>
                        <label> Slug</label>
                        <input type="text" class="form-control" value="{{$slug}}" wire:model="slug" name="slug">
                        @if($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                        <button class="btn btn-primary float-end mt-2 btn-sm pull-right">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>