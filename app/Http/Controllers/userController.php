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
    // Membuat Controller ini hanya dapat diaksis oleh user yang telah diverifikasi
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    // menampilkan list produk
    public function listProduct()
    {
        $product = Product::all();
    	return view('user/list-product', ['product' => $product]);
    }

    // Menampilkan detail produk
    public function detailProduct($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('/user/detail-product', [
            'product' => $product,
        ]);
    }

    // Menyimpan produk ke keranjang
    public function saveProduct(Request $request)
    {
        TempCart::create($request->all());
        return redirect('/detail-product/'.$request->product_id)->with('success', 'Add to Cart Successfully');
    }

    // Menampilkan keranjang
    public function cart()
    {
        $cart = TempCart::where('user_id', auth()->user()->id)->get();
    	return view('user/cart', ['cart' => $cart]);
    }

    // Perintah saat tombol order ditekan
    public function order(Request $request)
    {
        $total_price = 0;

        // Menyimpan pada tabel orders
        DB::table('orders') -> insert([
            'user_id' => $request->user_id,
            'order_date' => NOW(),
            'address' => $request->address,
            'total_price' => "0",
            'status' => "Pending",
            'payment' => ""
        ]);

        // Mengambil id orders yang terakhir disimpan
        $id = DB::getPdo()->lastInsertId();

        // Menimpan notif untuk ditampilkan di halaman admin
        DB::table('notifs') -> insert([
            'description' => "There is an order with no ".$id
        ]);
        
        // Mengambil data pada tabel temp_cart sesui dengan id user dan memasukkanya pada tabel detail-orders
        $cart = TempCart::where('user_id', $request->user_id)->get();
        foreach ($cart as $data) {
            DB::table('detail_orders') -> insert([
                'order_id' => $id,
                'product_id' => $data->product_id,
                'pcs' => $data->pcs
            ]);
            $total_price = $total_price + ($data->product->price*$data->pcs);
        };
        
        // update total price pada tabel orders
        DB::table('orders')->where('order_id',$id)->update([
            'total_price' => $total_price
        ]);
        
        // Menghapus data pada temp_cart berdasarkan id user
        DB::table('temp_cart')->where('user_id',$request->user_id)->delete();
        
        // Mengirim email invoice ke user dan admin
        $email = User::where('id', $request->user_id)->first();
        $email_admin = Admin::where('id', '1')->first();
        Mail::to($email->email)->send(new EmailInvoice($id));
        Mail::to($email_admin->email)->send(new EmailInvoice($id));
        
        return view('user/order-completed');
    }

    // Menampilkan list order
    public function listOrder()
    {
        $order = Order::where('user_id', auth()->user()->id)->get();
    	return view('user/list-order', ['order' => $order]);
    }

    // Menampilkan detail order
    public function detailOrder($order_id)
    {
        $order = Order::findOrFail($order_id);
        $detail_order = DetailOrder::where('order_id', $order_id)->get();
        return view('user/detail-order', [
            'order' => $order,
            'detail_order' => $detail_order,
        ]);
    }

    // upload bukti pembayaran
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

