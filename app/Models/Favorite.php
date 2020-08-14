<?php

namespace App\Models;
use Auth;
use App\Models\Client;
use App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['client_id','product_id'];
    
    public function client(){
        return $this->hasOne(Client::class,'id','client_id');
    }
    
    public function product(){
        return $this->hasOne(Product::class,'id','product_id');
    }
    
}
