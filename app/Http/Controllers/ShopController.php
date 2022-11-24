<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock; //追記
use App\Models\Cart; //追記

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $stocks = Stock::paginate(6);
        return view('shop', compact('stocks'));
    }

    public function myCart(Request $request)
    {
        $my_carts = Cart::all();
        return view('mycart', compact('my_carts'));
    }
}
