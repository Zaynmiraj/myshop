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
                            <h3 class="card-title"> Add new Slider </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.homesliders')}}" class="btn float-end btn-primary btn-sm pull-right">All Sliders</a>
                        </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="AddSlider()">
                        <div class="mb-2 mt-2">
                            <label for="top_title" class="form-label">top_title</label>
                            <input type="text" class="form-control" wire:model="top_title" name="top_title" id="top_title" required>
                            @error('top_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="title" class="form-label">title</label>
                            <input type="text" class="form-control" name="title" wire:model="title" id="title" required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="Sub_title" class="form-label">Sub_title</label>
                            <input type="text" class="form-control" wire:model="sub_title" name="Sub_title" id="Sub_title" required>
                            @error('Sub_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="offer" class="form-label">offer</label>
                            <input type="text" class="form-control" name="offer" wire:model="offer" id="offer" required>
                            @error('offer')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="link" class="form-label">link</label>
                            <input type="text" class="form-control" name="link" wire:model="link" id="link" required>
                            @error('link')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="image" class="form-label">image</label>
                            <input type="file" class="form-control" name="image" wire:model="image" id="image" required>
                            @if($image)
                                <img src="{{$image->temporaryUrl()}}" class="img" width="100px" height="100px">
                            @endif
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status" class="form-label">status</label>
                            <select class="form-select" name="status" wire:model="status" id="status">
                                <option value="1">active</option>
                                <option value="0">inactive</option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-primary float-end mt-2 btn-sm pull-right">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>