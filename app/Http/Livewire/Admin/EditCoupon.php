<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class EditCoupon extends Component
{
    public $coupon_code;
    public $type;
    public $coupon_value;
    public $cart_value;
    public $coupon_id;

    public function mount($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $this->coupon_code = $coupon->code;
        $this->type = $coupon->type;
        $this->coupon_value = $coupon->coupon_value;
        $this->cart_value = $coupon->cart_value;
    }
    public function updated($input)
    {
        $this->validateOnly($input, [
            'coupon_code' => 'required',
            'type' => 'required',
            'coupon_value' => 'required',
            'cart_value' => 'required'
        ]);
    }

    public function EditCoupon()
    {
        $this->validate([
            'coupon_code' => 'required',
            'type' => 'required',
            'coupon_value' => 'required',
            'cart_value' => 'required'
        ]);
        $coupon = Coupon::where('code', $this->coupon_code)->first();
        $coupon->code = $this->coupon_code;
        $coupon->type = $this->type;
        $coupon->coupon_value = $this->coupon_value;
        $coupon->cart_value = $this->cart_value;
        $coupon->save();
        session()->flash('success', 'Coupon updated successfully!');
        return redirect()->route('admin.coupons');
    }

    public function render()
    {
        return view('livewire.admin.edit-coupon');
    }
}
