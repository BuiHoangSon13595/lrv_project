<?php
namespace App\Helper;
use App\Models\Product;


class Home{
    public static function new()
    {
        $model = Product::orderBy('created_at','desc')->paginate('4');
        return $model?$model:false;
    }
    public static function newest()
    {
        $model = Product::orderBy('price','asc')->first();
        return $model?$model:false;
    }
}

?>