<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Product;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function finish(Request $request, Product $product)
    {


        try {
            $cart = Session::get('cart');
            $total_price = 0;
            foreach ($cart as $item) {
                $total_price += ($item['quantity'] * $item['price']);
            }

            $newOrder = new Order();
            $newOrder->total_price = $total_price;
            $newOrder->save();

            $order_id = DB::getPdo()->lastInsertId();

            foreach ($cart as $item) {
                $orderProduct = new Order_Product();
                $orderProduct->order_id = $order_id;
                $orderProduct->product_id = $item['id'];
                $orderProduct->price = $item['price'];
                $orderProduct->quantity = $item['quantity'];
                $orderProduct->save();
            }

            Session::forget('cart');

            return response()->json([
                'success'       => true,
                'message'       => 'Order toegevoegd',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => 'It did not work : ' . $e->getMessage(),
            ]);
        }
    }
}
