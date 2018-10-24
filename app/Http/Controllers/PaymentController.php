<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
class PaymentController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}    

	public function success(Request $request){

		$order = Order::findOrFail($request->item_number);
		if($order->paid_orderid == null){
			$order->paid_orderid=$request->tx;
			$order->status = $request->st;
			$order->save();
		}else{
			echo "This order is already paid";
		}
	}

	public function cancel(){
		return redirect()->to('/');
	}
}
