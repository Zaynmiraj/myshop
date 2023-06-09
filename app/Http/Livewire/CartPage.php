<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\Coupon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class CartPage extends Component
{
    public $coupon;
    public $code;
    public $discount;
    public $subtotalDiscount;
    public $totalDiscount;
    public $taxDiscount;

    public function Increased($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId, $qty);
    }
    public function Decreased($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId, $qty);
    }
    public function Remove($id)
    {
        Cart::remove($id);
        return redirect()->back()->with('success', 'Cart removed');
    }


    //apply coupon codes 
    public function ApplyCoupon()
    {
        $coupon = Coupon::where('code', $this->code)->where('cart_value', '<=', Cart::instance('cart')->subtotal())->first();
        if (!$coupon) {
            session()->flash('error', 'Coupon code not found');
            return;
        }

        Session::put('coupon', [
            'code' => $coupon->code,
            'type' => $coupon->type,
            'coupon_value' => $coupon->coupon_value,
            'cart_value' => $coupon->cart_value,


        ]);
    }

    public function Calculate()
    {
        if (session()->has('coupon')) {
            if (session()->get('coupon')['type'] == 'fixed') {
                $this->discount = session()->get('coupon')['coupon_value'];
            } else {
                $this->discount = (Cart::instance('cart')->subtotal() * session()->get('coupon')['coupon_value']) / 100;
            }
            $this->subtotalDiscount = Cart::instance('cart')->subtotal() - $this->discount;
            $this->taxDiscount = ($this->subtotalDiscount * config('cart.tax')) / 100;
            $this->totalDiscount = $this->subtotalDiscount + $this->taxDiscount;
        }
    }

    public function Checkout()
    {
        if (Auth::check()) {
            return redirect()->route('checkout');
        } else {
            return redirect()->route('login');
        }
    }

    public function render()
    {
        if (session()->has('coupon')) {
            if (Cart::instance('cart')->subtotal() <  session()->get('coupon')['cart_value']) {
                session()->forget('coupon');
            } else {
                $this->Calculate();
            }
        }

        return view('livewire.CartPage');
    }
}
