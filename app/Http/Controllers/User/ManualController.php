<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Order;
use App\Mail\OrderMail;
use App\Models\Product;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Functions\GlobalFunction;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class ManualController extends Controller
{
    protected $global;

    public function __construct(GlobalFunction $global)
    {
        $this->global = $global;
    }

    public function ManualOrder(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

        // dd($charge);

        $image = $request->file('bukti_pembayaran');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(500, 637)->save('upload/orders/' . $name_gen);
        $save_url = 'upload/orders/' . $name_gen;

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

            'payment_type' => 'Transfer Bank Manual',
            'payment_method' => 'Transfer Bank Manual',
            'bukti_pembayaran' => $save_url,

            'currency' => 'Rp',
            'amount' => $total_amount,

            'order_number' => mt_rand(10000000, 99999999),
            'invoice_no' => 'ESZ' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'ditunda',
            'created_at' => Carbon::now(),

        ]);

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

        // syntak insert data ke tabel order item
        $cartsCheck = Cart::content();
        //function pengelola jika ada order pre order, dengan mengurangi stok bahan
        $output = $this->global->checkStockMaterial($cartsCheck, $order_id);

        $carts = Cart::content();

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

            if (Session::has('coupon')) {
                Session::forget('coupon');
            }

            //  Email Notification
            $invoice = Order::findOrFail($order_id);
            $data = [
                'invoice_number' => $invoice->invoice_number,
                'amount' => $total_amount,
                'name' => $invoice->name,
                'email' => $invoice->email,
            ];

            Mail::to($request->email)->send(new OrderMail($data));

            if (Session::has('coupon')) {
                Session::forget('coupon');
            }

            Cart::destroy();

        }

        if ($carts->isEmpty()) {

            if (!empty($output->notValid)) {

                $productName = array();
                foreach ($output->notValid as $data) {
                    $product = Product::where('id', $data['id'])->first();

                    array_push($productName, $product->product_name);
                }

                $name = implode(", ", $productName);

                $notification = array(
                    'message' => 'Pesanan ' . $name . ' gagal di buat, terjadi kesalahan.',
                    'alert-type' => 'warning'
                );

            } else {
                $notification = array(
                    'message' => 'Pesanan gagal di buat, terjadi kesalahan.',
                    'alert-type' => 'warning'
                );
            }

        } else {

            $name = '';

            if (!empty($output->notValid)) {

                $productName = array();
                foreach ($output->notValid as $data) {
                    $product = Product::where('id', $data['id'])->first();

                    array_push($productName, $product->product_name);
                }

                $name = implode(", ", $productName);

                // $notification2 = array(
                //     'message' => 'Pesanan ' . $name . ' gagal di buat, terjadi kesalahan.',
                //     'alert-type' => 'warning'
                // );

                $name = ' Pesanan ' . $name . 'gagal di buat';

            }

            if (empty($name)) {
                $notification = array(
                    'message' => 'Terima kasih! Pesanan Berhasil Dibuat.',
                    'alert-type' => 'success'
                );
            } else {

                $notification = array(
                    'message' => 'Terima kasih! Pesanan Berhasil Dibuat. dan ' . $name,
                    'alert-type' => 'success'
                );
            }

        }

        return redirect()->route('dashboard')->with($notification);

    }

}
