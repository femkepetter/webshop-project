<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function addReview(Request $request)
    {
        //dd($request->all()); //alles wat gepost wordt kan je nu even zien
        try {
            Review::create([
                'name'         => $request->name,
                'rating'         => $request->rating,
                'comment'    => $request->comment,
                'product_id'    => $request->product_id
            ]);
            return redirect()->route('product.show', $request->product_id);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
}
