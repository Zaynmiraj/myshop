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
                            <h3 class="card-title"> Add new Coupon </h3>
                        </div>
                        <div class="col-6">
                            <a href="{{route('admin.coupons')}}" class="btn float-end btn-primary btn-sm pull-right">All Coupons</a>
                        </div>
                </div>
                <div class="card-body">
                    <form wire:submit.prevent="AddCoupon()">
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="coupon_code">Coupon code</label>
                        <input type="text" class="form-control" wire:model="coupon_code" name="name">
                            @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                            <br/>
                        </div>
                        <div class="mb-2 mt-2">
                            <label class="form-label" for="type">Type</label>
                            <select class="form-select" wire:model="type">
                                <option value="">Select Coupon Type</option>
                                <option value="fixed">Fixed</option>
                                <option value="percentage">Percentage</option>
                            </select>
                            @if($errors->has('type'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="coupon_value" class="form-label">Value</label>
                            <input type="text" class="form-control" wire:model="coupon_value">
                            @if($errors->has('coupon_value'))
                            <span class="text-danger">{{ $errors->first('coupon_value') }}</span>
                            @endif
                        </div>
                        <div class="mb-2 mt-2">
                            <label for="cart_value" class="form-label">Cart Value</label>
                            <input type="text" class="form-control" wire:model="cart_value">
                            @if($errors->has('cart_value'))
                            <span class="text-danger">{{ $errors->first('cart_value') }}</span>
                            @endif
                        </div>
                        
                        <button class="btn btn-primary float-end mt-2 btn-sm pull-right">Submit</button>
                    </form>
            </div>
        </div>
    </div>
</div>