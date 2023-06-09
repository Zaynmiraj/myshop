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
                            <h3 class="card-title"> Add new category </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.category')}}" class="btn float-end btn-primary btn-sm pull-right">All Categories</a>
                        </div>
                </div>
                <div class="card-body">
                    <form wire:click.prevent="addCategory()">
                        <label>Name</label>
                        <input type="text" class="form-control" wire:model="name" wire:keyup="MakeSlug" name="name">
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br/>
                        <label> Slug</label>
                        <input type="text" class="form-control" wire:model="slug" name="slug">
                        @if($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                        <button class="btn btn-primary float-end mt-2 btn-sm pull-right">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>