<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Stock; //追記
use App\Models\Cart; //追記
use App\Mail\Thanks; //追記
use Illuminate\Support\Facades\Mail; //追記

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $stocks = Stock::paginate(6);
        return view('shop', compact('stocks'));
    }

    public function myCart(Cart $cart)
    {
        $data = $cart->showCart();
        return view('mycart', $data);
    }

    public function addMycart(Request $request, Cart $cart)
    {

        //カートに追加の処理
        $stock_id = $request->stock_id;
        $message = $cart->addCart($stock_id);

        //追加後の情報を取得
        $data = $cart->showCart();

        //with()を使ってviewに別口でデータを送れる
        return view('mycart', $data)->with('message', $message);
    }

    public function deleteCart(Request $request, Cart $cart)
    {
        //カートから削除の処理
        $stock_id = $request->stock_id;
        $message = $cart->deleteCart($stock_id);

        //追加後の情報を取得
        $data = $cart->showCart();

        return view('mycart', $data)->with('message', $message);
    }

    public function checkout(Request $request, Cart $cart)
    {
        //ログインユーザの情報を取得
        $user = Auth::user();

        //メールの準備
        $mail_data['user'] = $user->name;
        $mail_data['checkout_items'] = $cart->checkoutCart();
        Mail::to($user->email)->send(new Thanks($mail_data));
        return view('checkout');
    }
}
