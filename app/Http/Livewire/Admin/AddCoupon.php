<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AddCoupon extends Component
{
    public $coupon_code;
    public $type;
    public $coupon_value;
    public $cart_value;

    public function updated($input)
    {
        $this->validateOnly($input, [
            'coupon_code' => 'required',
            'type' => 'required',
            'coupon_value' => 'required',
            'cart_value' => 'required'
        ]);
    }

    public function AddCoupon()
    {
        $this->validate([
            'coupon_code' => 'required',
            'type' => 'required',
            'coupon_value' => 'required',
            'cart_value' => 'required'
        ]);
        $coupon = new Coupon();
        $coupon->code = $this->coupon_code;
        $coupon->type = $this->type;
        $coupon->coupon_value = $this->coupon_value;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        session()->flash('success', 'Coupon Added successfully!');
        return redirect()->route('admin.coupons');
    }
    public function render()
    {
        return view('livewire.admin.add-coupon');
    }
}
