<?php

namespace App\Http\Livewire\User;

use App\Models\Orders;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserOrders extends Component
{
    public function render()
    {
        $orders = Orders::where('user_id', Auth::user()->id)->paginate(10);
        return view('livewire.user.user-orders', ['orders' => $orders]);
    }
}
