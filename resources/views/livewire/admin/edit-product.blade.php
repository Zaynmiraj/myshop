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
                            <h3 class="card-title"> Edit products </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.product')}}" class="btn float-end btn-primary btn-sm pull-right">All Products</a>
                        </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="EditProduct()">
                        <div class="mb-2 mt-2">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{$name}}" wire:model="name" wire:keyup="MakeSlug" name="name">
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                           
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="slug"> Slug</label>
                            <input type="text" class="form-control" wire:model="slug" name="slug">
                            @if($errors->has('slug'))
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="short_description" class="form-label">Short Description</label>
                            <input type="text" class="form-control" wire:model="short_description" name="short_description">
                            @if($errors->has('short_description'))
                                <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                @endif
                                <small class="form-text text-muted">This is a short description</small>
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" name="description" wire:model="description"></textarea>
                            @if($errors->has('description'))
                            <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                         </div>
                         <div class="mb-2 mt-2">
                           <label class="form-label" for="sale_price">Price</label>
                           <input type="number" class="form-control" wire:model="sale_price" name="sale_price"placeholder="Enter price" />
                           @if($errors->has('price'))
                            <span class="text-danger">{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="regular_price">Regular Price</label>
                            <input type="number" class="form-control" wire:model="regular_price" name="regular_price" placeholder="Enter regular price" />
                            @if($errors->has('regular_price'))
                                <span class="text-danger">{{ $errors->first('regular_price') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="SKU">SKU</label>
                            <input type="text" class="form-control" wire:model="SKU" name="SKU">
                            @if($errors->has('SKU'))
                            <span class="text-danger">{{ $errors->first('SKU') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="quantity">Quantity</label>
                            <input type="number" class="form-control" wire:model="quantity" name="quantity">
                            @if($errors->has('Quantity'))
                            <span class="text-danger">{{ $errors->first('Quantity') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="stock_status">Stock Status</label>
                            <select class="form-select" wire:model="stock_status" name="stock_status">
                                <option value="Instock">Instock</option>
                                <option value="outofstock">Outofstock</option>
                            </select>

                            @if($errors->has('stock_status'))
                                <span class="text-danger">{{ $errors->first('stock_status') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="featured">Featured</label>
                            <select class="form-select" wire:model="featured" name="featured">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                            @if($errors->has('featured'))
                                <span class="text-danger">{{ $errors->first('featured') }}</span>
                            @endif
                        </div>
                        <div class="">
                            <label class="form-label" for="file">Image</label>
                            <input type="file" class="form-control" name="image" wire:model="image" />
                            @if ($image) 
                             <img src="{{asset('assets/imgs/products')}}/{{$image}}" width='150px' height="150px"> :
                            
                            @else
                            <img src="{{ $image->temporaryUrl()}}" width='150px' height="150px">
                            @endif
                            @if($errors->has('image'))
                                <span class="text-danger">{{ $errors->first('image') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="category">Category</label>
                            <select class="form-select" wire:model="category" name="category">
                                <option value="">Select...</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <span class="text-danger">{{ $errors->first('category') }}</span>
                            @endif
                        </div>
                        


                        <button class="btn btn-primary float-end mt-2 btn-sm pull-right">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>