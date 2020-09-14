<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\TempCart;
use App\User;
use App\Order;
use App\Admin;
use App\DetailOrder;
use App\Mail\EmailInvoice;
use Illuminate\Support\Facades\DB;
use App\Mail\MalasngodingEmail;
use Illuminate\Support\Facades\Mail;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function listProduct()
    {
        $product = Product::all();
    	return view('user/list-product', ['product' => $product]);
    }

    public function detailProduct($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('/user/detail-product', [
            'product' => $product,
        ]);
    }

    public function saveProduct(Request $request)
    {
        TempCart::create($request->all());
        return redirect('/detail-product/'.$request->product_id)->with('success', 'Add to Cart Successfully');
    }

    public function cart()
    {
        $cart = TempCart::where('user_id', auth()->user()->id)->get();
    	return view('user/cart', ['cart' => $cart]);
    }

    public function order(Request $request)
    {
        $total_price = 0;

        DB::table('orders') -> insert([
            'user_id' => $request->user_id,
            'order_date' => NOW(),
            'address' => $request->address,
            'total_price' => "0",
            'status' => "Pending",
            'payment' => ""
        ]);


        $id = DB::getPdo()->lastInsertId();

        DB::table('notifs') -> insert([
            'description' => "There is an order with no ".$id
        ]);
        
        $cart = TempCart::where('user_id', $request->user_id)->get();
        foreach ($cart as $data) {
            DB::table('detail_orders') -> insert([
                'order_id' => $id,
                'product_id' => $data->product_id,
                'pcs' => $data->pcs
            ]);
            $total_price = $total_price + ($data->product->price*$data->pcs);
        };
        DB::table('orders')->where('order_id',$id)->update([
            'total_price' => $total_price
        ]);
        
        DB::table('temp_cart')->where('user_id',$request->user_id)->delete();
        $email = User::where('id', $request->user_id)->first();
        $email_admin = Admin::where('id', '1')->first();
        Mail::to($email->email)->send(new EmailInvoice($id));
        Mail::to($email_admin->email)->send(new EmailInvoice($id));
        return view('user/order-completed');
    }

    public function listOrder()
    {
        $order = Order::where('user_id', auth()->user()->id)->get();
    	return view('user/list-order', ['order' => $order]);
    }

    public function detailOrder($order_id)
    {
        $order = Order::findOrFail($order_id);
        $detail_order = DetailOrder::where('order_id', $order_id)->get();
        return view('user/detail-order', [
            'order' => $order,
            'detail_order' => $detail_order,
        ]);
    }

    public function uploadPayment(Request $request)
    {
        $file = $request->file('payment');
        $nama_file = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $ukuran_file = $file->getSize();
        $destinationPath = 'payment';
        $file->move($destinationPath,$file->getClientOriginalName());

        DB::table('orders')->where('order_id',$request->order_id)->update([
            'payment' => $nama_file
        ]);

        return view('user/payment-completed');
    }

}

