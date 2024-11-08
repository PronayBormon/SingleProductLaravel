<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        return view('admin.pages.dashboard');
    }
    public function site_settings(){
        return view('admin.pages.webseting');
    }
    public function orders()
    {
        $orders = Order::with('orderItems')->orderBy('id', 'desc')->paginate(10);
        return view('admin.pages.orders.order-list', compact('orders'));
    }
    public function order_update(Request $request)
    {
        
        $id = $request->id;
        $order = Order::where('id', $id)->first();
        
        $order->update([
            'payment_status' => $request->payment_status,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('message', 'Order has been update successfully');
    }
}
