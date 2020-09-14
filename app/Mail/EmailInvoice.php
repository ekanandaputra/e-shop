<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\DetailOrder;
use App\Mail\EmailInvoice;
use Illuminate\Support\Facades\DB;
use App\Mail\MalasngodingEmail;
use Illuminate\Support\Facades\Mail;

class EmailInvoice extends Mailable
{
    use Queueable, SerializesModels;

    protected $inputs;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $detail = DetailOrder::all();
        $order = Order::where('order_id', $this->inputs)->get();

       return $this->from('1artupputra@gmail.com')
                   ->view('user/template-admin')
                   ->with(
                    [
                        'detail' => $detail,
                        'order' => $order,
                    ]);
    }
}