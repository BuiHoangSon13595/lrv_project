<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_detail extends Model
{
    protected $fillable = ['product_id','color_id'];

    public function product_color()
    {
        return $this->hasOne(Color::class,'id','color_id');
    }
}
