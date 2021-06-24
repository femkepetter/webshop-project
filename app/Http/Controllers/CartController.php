<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    //
    public function addToCart(Request $request, Product $product)
    {

        try {
            $validated = $request->validate([
                'product' => 'required'
            ]);

            $request->session()->push('cart', [$product->id => 1]);

            return response()->json([
                'succes' => true
            ]);
        } catch (Exception $e) {

            return response()->json([
                'succes' => false,
                'request' => $request->item,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function show(Request $request)
    {
        $cart = session('cart');

        $cartArray = [];;
        $testItems = Product::all();
        if ($cart != null) {
            foreach ($cart as $item) {
                foreach ($item as $id => $amount) {
                    //$testItem = Item::where('id', $id)->get()
                    $testItem = $testItems->find($id);
                    $testItem->quantity = $amount;
                    //dd($testItem);
                    $cartArray[] = $testItem;
                };
            };
        }

        return view('cart.show', [
            'cartArray' => $cartArray
        ]);
    }
}

//     public function delete(Request $request, $index)
//     {
//         $tempArray = $request->session()->get('cart');
//         $i = 0;
//         $request->session()->forget('cart');
//         foreach ($tempArray as $subArray) {
//             if ($i != $index) {
//                 $request->session()->push('cart', $subArray);
//             }
//             $i++;
//         }
//         return redirect(route('cart.show'));
//     }

//     public function add(Request $request, $index)
//     {

//         try {
//             $tempValue = $request->session()->get('cart.' . $index);
//             foreach ($tempValue as $key => $value) {
//                 $tempValue[$key] += 1;
//             }
//             $request->session()->put('cart.' . $index, $tempValue);

//             return response()->json([
//                 'succes' => true,
//                 'test' => $request->session()->get('cart.' . $index),
//                 'redirect' => route('cart.show')
//             ]);
//         } catch (Exception $e) {

//             return response()->json([
//                 'succes' => false,
//                 'request' => $request->item,
//                 'message' => $e->getMessage()
//             ]);
//         }
//     }

//     public function sub(Request $request, $index)
//     {

//         try {
//             $tempValue = $request->session()->get('cart.' . $index);
//             foreach ($tempValue as $key => $value) {
//                 $tempValue[$key] -= 1;
//             }
//             $request->session()->put('cart.' . $index, $tempValue);

//             return response()->json([
//                 'succes' => true,
//                 'test' => $request->session()->get('cart.' . $index),
//                 'redirect' => route('cart.show')
//             ]);
//         } catch (Exception $e) {

//             return response()->json([
//                 'succes' => false,
//                 'request' => $request->item,
//                 'message' => $e->getMessage()
//             ]);
//         }
//     }
// }
