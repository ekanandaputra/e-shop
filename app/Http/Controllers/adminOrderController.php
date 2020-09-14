<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\DetailOrder;

class adminOrderController extends Controller
{
    // Membuat Controller ini hanya dapat diaksis oleh admin
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    // Menampilkan list order
    public function showOrder()
    {
        $order = Order::all();
    	return view('admin/order/list_order', ['order' => $order]);
    }

    // Menampilkan detail order
    public function orderDetail($order_id)
    {
        $order = Order::findOrFail($order_id);
        $detail_order = DetailOrder::where('order_id', $order_id)->get();
        return view('admin/order/show_detail', [
            'order' => $order,
            'detail_order' => $detail_order,
        ]);
    }

    // mengganti status order menjadi delivered
    public function changeStatus(Request $request, $order_id)
    {
        Order::where('order_id',$order_id)->update([
            'status' => "Delivered"
        ]);
        return redirect('admin/show/order/'.$order_id)->with('success', 'Status Successfully Change to Delivered');
    }


}
