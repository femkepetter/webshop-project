<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\Product;
>>>>>>> main
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
<<<<<<< HEAD
        $this->middleware('auth');
=======
        //$this->middleware('auth');
>>>>>>> main
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
<<<<<<< HEAD
        return view('home');
=======
        return view('home', [
            'products' => Product::all(),
        ]);
>>>>>>> main
    }
}
