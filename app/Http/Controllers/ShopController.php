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
        $stocks = Stock::paginate(6);
        return view('shop', compact('stocks'));
    }

    public function myCart(Cart $cart)
    {
        $my_carts = $cart->showCart();
        return view('mycart', compact('my_carts'));
    }

    public function addMycart(Request $request, Cart $cart)
    {

        //カートに追加の処理
        $stock_id = $request->stock_id;
        $message = $cart->addCart($stock_id);

        //追加後の情報を取得
        $my_carts = $cart->showCart();

        return view('mycart', compact('my_carts', 'message'));
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        //カートから削除の処理
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);

        //追加後の情報を取得
        $my_carts = $cart->showCart();

        return view('mycart', compact('my_carts', 'message'));
    }
}
