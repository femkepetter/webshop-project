<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function show()
    {
        return view('cart.show');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function addToCart(Request $request)
    {
        try {
            $this->cartCounter();

            $product = Product::findOrFail($request->product_id);

            $cart = session()->get('cart', []);
            $isNew = false;

            if (isset($cart[$request->product_id])) {
                $cart[$request->product_id]['quantity']++;
            } else {
                $cart[$request->product_id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "id"    => $product->id,
                ];
                $isNew = true;
            }

            session()->put('cart', $cart);

            return response()->json([
                'success'       => true,
                'message'       => 'Product toegevoegd',
                'quantity'      => $cart[$request->product_id]['quantity'],
                'total_count'   => $this->cartCounter(),
                'name'          => $cart[$request->product_id]['name'],
                'price'         => $cart[$request->product_id]['price'],
                'id'            => $cart[$request->product_id]['id'],
                'is_new'        => $isNew
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success'   => false,
                'message'   => 'It did not work : ' . $e->getMessage(),
            ]);
        }
    }

    private function cartCounter()
    {
        $counter = 0;

        $cart = session()->get('cart');

        if (is_null($cart)) {
            return 0;
        }

        foreach ($cart as $item) {
            $counter += $item['quantity'];
        }

        return $counter;
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
