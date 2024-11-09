<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Validator;

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
        $orders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',1)->paginate(10);
        $ConfirmOrders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',2)->paginate(10);
        $CancelOrders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',3)->paginate(10);
        $ReturnOrders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',4)->paginate(10);
        $RecontactOrders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',5)->paginate(10);
        $BookToCourierOrders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',6)->paginate(10);
        $DeliveredOrders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',7)->paginate(10);
        $unpaidDeliveredOrders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',7)->where('payment_status',0)->paginate(10);
        $PaidDeliveredOrders = Order::with('orderItems')->orderBy('id', 'desc')->where('status',7)->where('payment_status',1)->paginate(10);
        return view('admin.pages.orders.order-list', compact('orders','ConfirmOrders','CancelOrders','ReturnOrders','RecontactOrders','BookToCourierOrders','DeliveredOrders','unpaidDeliveredOrders','PaidDeliveredOrders'));
    }
    public function search_order(Request $request)
    {
        $query = Order::orderBy('id', 'desc'); 
        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
    
            $query->where(function($q) use ($searchTerm) {
                $q->where('tracking_id', 'like', '%' . $searchTerm . '%')
                  ->orWhere('first_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('last_name', 'like', '%' . $searchTerm . '%')
                  ->orWhere('mobile', 'like', '%' . $searchTerm . '%')
                  ->orWhere('status', 'like', '%' . $searchTerm . '%');  
            });
        }
        
        $orders = $query->paginate(10);        
        return view('admin.pages.orders.order-search', compact('orders'));
    }
    

    public function order_update(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id', $id)->first();
        
        $order->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->with('message', 'Order has been update successfully');
    }
    public function payment_update(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id', $id)->first();
        
        $order->update([
            'payment_status' => $request->payment_status,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('message', 'Order has been update successfully');
    }
    public function remark(Request $request)
    {
        $id = $request->id;
        $order = Order::where('id', $id)->first();
        
        $order->update([
            'remark' => $request->remark,
            'status' => $request->status,
        ]);
        return redirect()->back()->with('message', 'Order has been update successfully');
    }
}
