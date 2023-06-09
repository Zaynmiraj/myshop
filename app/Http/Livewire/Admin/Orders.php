<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Orders as Order;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class Orders extends Component
{
    public function updateStatus($order_id, $status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if ($order->status == 'delivered') {
            $order->delivery_date = DB::raw('current_date');
        } elseif ($order->status == 'canceled') {
            $order->canceled_date = DB::raw('current_date');
        }
        $order->save();
        session()->flash('success', 'order status updated');
    }
    use WithPagination;
    public function render()
    {
        $order = Order::orderBy('created_at', 'DESC')->paginate(5);
        return view('livewire.admin.orders', ['orders' => $order]);
    }
}
