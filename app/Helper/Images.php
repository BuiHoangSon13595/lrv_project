<?php

namespace App\Helper;

use App\Models\Product_image;


class Images{
    public static function add($product){
        $list = json_decode(request()->images);
        if($product){
            if($list == ''){
                Product_image::create([
                    'product_id'=>$product->id,
                ]);
            }else{
                for($i=0;$i<count($list);$i++){
                    Product_image::create([
                        'product_id'=>$product->id,
                        'image'=>str_replace(url('public/image').'/','',$list[$i])
                    ]);
                }
            }
        }
    }
    public static function update_image($product,$id){
        $list = json_decode(request()->images);
        if($product){
            Product_image::where(['product_id'=>$id])->delete();
            if($list == null){
                Product_image::create([
                    'product_id'=>$id,
                ]);
            }else{
                for($i=0;$i<count($list);$i++){
                    Product_image::create([
                        'product_id'=>$id,
                        'image'=>str_replace(url('public/image').'/','',$list[$i])
                    ]);
                }
            }
        }
    }
}

?>