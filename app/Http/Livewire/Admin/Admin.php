<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Admin extends Component
{
    public function updateStatus($order_id, $status)
    {
        $order = Orders::find($order_id);
        $order->status = $status;
        if ($order->status == 'delivered') {
            $order->delivery_date = DB::raw('current_date');
        } elseif ($order->status == 'canceled') {
            $order->canceled_date = DB::raw('current_date');
        }
        $order->save();
        session()->flash('success', 'order status updated');
    }
    public function render()
    {
        $orders = Orders::orderBy('created_at', 'DESC')->get()->take(5);
        $totalSale = Orders::where('status', 'delivered')->count();
        $totaleRevenue = Orders::where('status', 'delivered')->sum('total');
        $todaySale = Orders::where('status', 'delivered')->whereDate('created_at', Carbon::today())->count();
        $todayRevenue = Orders::where('status', 'delivered')->whereDate('created_at', Carbon::today())->sum('total');

        return view('livewire.admin.admin', [
            'orders' => $orders,
            'todayRevenue' => $todayRevenue,
            'todaySale' => $todaySale,
            'totalSale' => $totalSale,
            'totalRevenue' => $totaleRevenue
        ]);
    }
}
