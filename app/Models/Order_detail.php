<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    protected $fillable = ['order_id','product_detail_id','quantity','price'];
}
