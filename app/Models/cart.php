<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    // 変更を許可するカラム
    protected $fillable = [
        'stock_id',
        'user_id',
    ];
}
