<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    // idカラムを保護する
    protected $guarded = [
        'id',
    ];
}
