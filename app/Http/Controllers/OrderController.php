<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Order_Product;
use App\Models\Product;
use App\Models\ProductType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function show()
    {
        return view('order.show',[
                'category' => Category::all(),
                'product_type'  => ProductType::all(),
            
        ]);
    }


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
            $newOrder->first_name = $request->first_name;
            $newOrder->last_name = $request->last_name;
            $newOrder->delivery_address = $request->delivery_address;
            $newOrder->save();

            $order_id = DB::getPdo()->lastInsertId(); //order_id = newOrder id? 

            foreach ($cart as $item) {
                $orderProduct = new Order_Product();
                $orderProduct->order_id = $order_id;
                $orderProduct->product_id = $item['id'];
                $orderProduct->price = $item['price'];
                $orderProduct->quantity = $item['quantity'];
                $orderProduct->save();
            }

            Session::forget('cart');

            return view('order.finish',
            [
                'category' => Category::all(),
                'product_type'  => ProductType::all(),
            ]);
            
        } catch (Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => 'It did not work : ' . $e->getMessage(),
            ]);
        }
    }
}
