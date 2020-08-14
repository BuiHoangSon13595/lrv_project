<?php

namespace App\Helper;

use App\Models\Product_detail;


class Colors{
    public static function add($product){
        $color = request()->color;
        if($product){
            if($color == ''){
                Product_detail::create([
                    'product_id'=>$product->id,
                ]);
            }else{
                for($i=0;$i<count($color);$i++){
                    Product_detail::create([
                        'product_id'=>$product->id,
                        'color_id'=>$color[$i]
                    ]);
                }
            }
        }
    }
    public static function update_color($product,$id){
        $color = request()->color;
        if($product){
            Product_detail::where(['product_id'=>$id])->delete();
            if($color == ''){
                Product_detail::create([
                    'product_id'=>$id,
                ]);
            }else{
                for($i=0;$i<count($color);$i++){
                    Product_detail::create([
                        'product_id'=>$id,
                        'color_id'=>$color[$i]
                    ]);
                }
            }
        }
    }
}

?>