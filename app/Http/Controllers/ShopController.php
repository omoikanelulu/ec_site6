<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Stock; //追記
use App\Models\Cart; //追記

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $stocks = Stock::paginate(4);
        return view('shop', compact('stocks'));
    }

    public function myCart(Request $request)
    {
        $my_carts = Cart::all();
        return view('mycart', compact('my_carts'));
    }

    public function addMyCart(Request $request)
    {
        $user_id = auth('id');
        $stock_id = $request->stock_id;
        $cart_add_info = Cart::firstOrCreate(['stock_id' => $stock_id, 'user_id' => $user_id]);

        if ($cart_add_info->wasRecentlyCreate) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済みです';
        }

        $my_carts = Cart::where('user_id', $user_id)->get();

        return view('mycart', compact('my_carts', 'message'));
    }
}