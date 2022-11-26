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
}
