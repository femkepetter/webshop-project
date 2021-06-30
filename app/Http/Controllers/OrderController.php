<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function NewOrder(Request $request, $id)
    {
        // $this->validate($request, [
        //     'payment' => 'required',
        // ]);

        $cart = Session::get('cart');
        $total = 0;
        foreach ($cart as $data) {
            $total_amount = $data['amount'] * $data['qty'];
            $qty = $data['qty'];
        }
        $quantity = $qty + 0;

        $new = new Order();
        //$new->user_id = Auth::user()->id;
        $new->note = $request['note'];
        $new->total_quantity = $quantity;
        $new->total_amount = $total_amount;
        $new->status = 1;
        $new->save();

        $order_id = DB::getPdo()->lastInsertId();

        foreach ($cart as $data) {
            $total_amount = $data['amount'] * $data['qty'];
            $qty = $data['qty'];
            $orderProduct = new Order_Product();
            $orderProduct->order_id = $order_id;
            $orderProduct->product_id = $data['product_id'];
            $orderProduct->product_name = $data['product_name'];
            $orderProduct->product_price = $data['product_price'];
            $orderProduct->product_quantity = $data['product_quantity'];
            $orderProduct->save();
        }

        Session::forget('cart');
        return redirect()->route('order.show', $id);
    }
}
