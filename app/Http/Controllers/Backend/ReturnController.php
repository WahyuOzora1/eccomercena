<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Functions\GlobalFunction;
use App\Http\Controllers\Controller;

class ReturnController extends Controller
{
    protected $global;

    function __construct(GlobalFunction $global) {
        $this->global = $global;
    }
    public function ReturnRequest(){

    	$orders = Order::where('return_order',1)->orderBy('id','DESC')->get();
    	return view('backend.return_order.return_request',compact('orders'));

    }


    public function ReturnRequestApprove($order_id){

    	Order::where('id',$order_id)->update(['return_order' => 2]);

        $checkReturnOrderStatus = Order::where('id', $order_id)->first();

        if($checkReturnOrderStatus->return_order == 2) {
            $this->global->returnOrder($order_id);
        }

    	$notification = array(
            'message' => 'Permintaaan Pengembalian Pesanan Berhasil',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);


    } // end mehtod


    public function ReturnAllRequest(){

    	$orders = Order::where('return_order',2)->orderBy('id','DESC')->get();
    	return view('backend.return_order.all_return_request',compact('orders'));

    }


}
