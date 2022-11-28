<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; //追記

class cart extends Model
{
    // 変更を許可するカラム
    protected $fillable = [
        'stock_id',
        'user_id',
    ];

    public function stock()
    {
        return $this->belongsTo('\App\Models\Stock');
    }

    public function showCart()
    {
        $user_id = Auth::id();
        return $this->where('user_id', $user_id)->get();
    }

    public function addCart($stock_id)
    {
        $user_id = Auth::id();
        $cart_add_info = $this->firstOrCreate(['stock_id' => $stock_id, 'user_id' => $user_id]);

        if ($cart_add_info->wasRecentlyCreated) {
            $message = 'カートに追加しました';
        } else {
            $message = 'カートに登録済みです';
        }

        return $message;
    }

    public function deleteCart($stock_id)
    {
        $user_id = Auth::id();

        $result = $this->where(['user_id' => $user_id])->where(['stock_id' => $stock_id])->delete();

        if ($result == false) {
            $message = '削除に失敗しました';
        } else {
            $message = '商品をカート内から削除しました';
        }

        return $message;
    }
}
