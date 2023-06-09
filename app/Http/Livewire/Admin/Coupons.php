<?php

namespace App\Http\Livewire\Admin;

use App\Models\Coupon;
use Livewire\Component;

class Coupons extends Component
{
    public function DeleteCoupon($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon) {
            $coupon->delete();
        }
        session()->flash('success', 'Coupon deleted successfully!');
        return redirect()->route('admin.coupons');
    }
    public function render()
    {
        $coupons = Coupon::all();
        return view('livewire.admin.coupons', ['coupons' => $coupons]);
    }
}
