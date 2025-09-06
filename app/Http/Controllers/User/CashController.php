<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;

use App\Mail\OrderMail;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Functions\GlobalFunction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class CashController extends Controller
{
    protected $global;

    function __construct(GlobalFunction $global)
    {
        $this->global = $global;
    }
    public function CashOrder(Request $request)
    {


        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }



        // dd($charge);

        $order_id = Order::insertGetId([
            'user_id' => Auth::id(),
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'post_code' => $request->post_code,
            'address' => $request->address,

            'payment_type' => 'Cash On Delivery',
            'payment_method' => 'Cash On Delivery',

            'currency' =>  'Rp',
            'amount' => $total_amount,

            'order_number' => mt_rand(10000000, 99999999),
            'invoice_no' => 'ESZ' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'ditunda',
            'created_at' => Carbon::now(),

        ]);



        $carts = Cart::content();

        // print_r($cartsCheck);
        // //function pengelola jika ada order pre order, dengan mengurangi stok bahan
        // $output = $this->global->checkStockMaterial($cartsCheck, $order_id);


        // $carts = Cart::content();
        // echo "<br>sasasas <br>";
        // print_r($carts);
        // die();

        //hapus data order jika cart kosont
        if ($carts->isEmpty()) {
            Order::destroy($order_id);
        } else {

            foreach ($carts as $cart) {
                OrderItem::insert([
                    'order_id' => $order_id,
                    'product_id' => $cart->id,
                    'color' => $cart->options->color,
                    'size' => $cart->options->size,
                    'qty' => $cart->qty,
                    'weight' => $cart->weight,
                    'price' => $cart->price,
                    'created_at' => Carbon::now(),

                ]);
            }

            //  Start Send Email
            $invoice = Order::findOrFail($order_id);
            $data = [
                'invoice_no' => $invoice->invoice_no,
                'amount' => $total_amount,
                'name' => $invoice->name,
                'email' => $invoice->email,
            ];

            Mail::to($request->email)->send(new OrderMail($data));

            //  End Send Email


            if (Session::has('coupon')) {
                Session::forget('coupon');
            }

            Cart::destroy();
        }


        if ($carts->isEmpty()) {

            $notification = array(
                'message' => 'Pesanan gagal di buat, terjadi kesalahan.',
                'alert-type' => 'warning'
            );
        } else {




            $notification = array(
                'message' => 'Terima kasih! Pesanan Berhasil Dibuat.',
                'alert-type' => 'success'
            );

            return redirect()->route('dashboard')->with($notification);
        } // end method




    }
}
