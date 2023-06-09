<?php

namespace App\Http\Livewire;

use App\Mail\OrderConfirmation;
use App\Models\Orders;
use Livewire\Component;
use App\Models\Transection;
use App\Models\OrderItem;
use App\Models\Shipping;
use Cart;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\Support\Facades\Mail;

class Checkout extends Component
{
    public $first_name;
    public  $last_name;
    public $email;
    public $phone;
    public $line_1;
    public $line_2;
    public $city;
    public $state;
    public $zip_code;
    public $country;
    public $status = 'ordered';
    public $is_shipping_deffrent;
    public $payment;
    public $thanks;


    public $card_no;
    public $card_month;
    public $card_year;
    public $card_cvv;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required | email',
            'phone' => 'required ',
            'line_1' => 'required',
            'line_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'payment' => 'required',
            'status' => 'required'
        ]);
    }

    public function checkout()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'line_1' => 'required',
            'line_2' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
            'country' => 'required',
            'status' => 'required',
            'payment' => 'required'
        ]);

        $order = new Orders();
        $order->user_id = auth()->id();
        $order->first_name = $this->first_name;
        $order->last_name = $this->last_name;
        $order->email = $this->email;
        $order->phone = $this->phone;
        $order->line_1 = $this->line_1;
        $order->line_2 = $this->line_2;
        $order->city = $this->city;
        $order->state = $this->state;
        $order->zip_code = $this->zip_code;
        $order->country = $this->country;
        $order->subtotal = Cart::subtotal();
        $order->discount = 10;
        $order->tax = Cart::tax();
        $order->total = Cart::total();
        $order->save();

        foreach (Cart::content() as $cart) {
            $orderItem = new OrderItem();
            $orderItem->orders_id = $order->id;
            $orderItem->product_id = $cart->id;
            $orderItem->quantity = $cart->qty;
            $orderItem->price = $cart->price;
            $orderItem->save();
        }
        if ($this->payment == 'cash') {
            $this->Transaction($order->id, 'pending');
            $this->restCart();
        } elseif ($this->payment == 'card') {
            $stripe = Stripe::make(env('STRIPE_KAY'));
            try {
                $token = $stripe->tokens()->create([
                    'card' => [
                        'number' => $this->card_no,
                        'exp_month' => $this->card_month,
                        'exp_year' => $this->card_year,
                        'cvc' => $this->card_cvv
                    ]
                ]);
                if (!isset($token['id'])) {
                    session()->flash('error', 'Stripe token was not created');
                }
                $customer = $stripe->customers()->create([
                    'name' => $this->first_name . ' ' . $this->last_name,
                    'email' => $this->email,
                    'phone' => $this->phone,
                    'address' => [
                        'line1' => $this->line_1,
                        'line2' => $this->line_2,
                        'city' => $this->city,
                        'state' => $this->state,
                        'postal_code' => $this->zip_code,
                        'country' => $this->country
                    ],
                    'source' => $token['id']
                ]);
                $charge = $stripe->charges()->create([
                    'amount' => Cart::total(),
                    'currency' => 'USD',
                    'customer' => $customer['id'],
                    'description' => 'Payment for order no ' . ' ' . $order->id,
                ]);
                if ($charge['status'] == 'succeeded') {
                    $this->Transaction($order->id, 'Approved');
                    $this->restCart();
                } else {
                    session()->flash('error', 'Transaction Failed');
                    $this->thanks = 0;
                }
            } catch (Exception $e) {
                session()->flash('error', $e->getMessage());
                $this->thanks = 0;
            }
        }
        $this->OrderMail($order);
    }

    public function OrderMail($order)
    {
        Mail::to($order->email)->send(new OrderConfirmation($order));
    }

    public function restCart()
    {
        Cart::content()->empty();
        $this->thanks = 1;
    }
    public function VeryfyAction()
    {
        if (!Auth::user()) {
            return redirect('login');
        } else if ($this->thanks) {
            return redirect()->route('thanks');
        }
    }

    public function Transaction($order_id, $status)
    {
        $transection = new Transection();
        $transection->user_id = auth()->id();
        $transection->orders_id = $order_id;
        $transection->status = $status;
        $transection->payment = $this->payment;
        $transection->save();
    }


    public function render()
    {
        $this->VeryfyAction();
        return view('livewire.checkout');
    }
}
