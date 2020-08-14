<?php

namespace App\Models;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable= ['client_id','status','total_amount','name','address','phone','payment_id','shipping_id'];

    public function payment()
    {
        return $this->hasOne(Payment::class,'id','payment_id');
    }
    public function shipping()
    {
        return $this->hasOne(Shipping::class,'id','shipping_id');
    }
    public function user_order()
    {
        return $this->hasOne(User::class,'id','client_id');
    }
    public function order_detail()
    {
        return $this->hasMany(Product_detail::class,'order_id','id');
    }
}
