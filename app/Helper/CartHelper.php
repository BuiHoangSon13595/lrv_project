<?php
namespace App\Helper;

use App\Models\Product_detail;
use App\Models\Color;

class CartHelper{

    public $items = [];
    public $total_price = 0;
    public $total_quantity = 0;
    public function __construct(){
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }
    
    public function add($product,$quantity){
        $product_detail = Product_detail::where(['product_id'=>$product->id,'color_id'=>request()->color_id])->first();
        $color = Color::find(request()->color_id);
        $item = [
            'id' => $product_detail->id,
            'color'=>$color?$color->name:'',
            'name' => $product->name,
            'category' => $product->category->name,
            'price' => $product->sale_price ? $product->sale_price : $product->price,
            'image' => $product->image,
            'quantity' => $quantity,
        ];
        if(isset( $this->items[$product_detail->id])){
            $this->items[$product_detail->id]['quantity'] = $quantity;
        }
        else{
            $this->items[$product_detail->id] = $item;
        }
        session(['cart' => $this->items]);
    }
    
    public function remove($id){

        if(isset( $this->items[$id])){
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }
    
    public function update(){
        $list_id = request()->id;
        $list_quantity = request()->quantity;
        for($i = 0; $i < count($list_id); $i++){
            if(isset( $this->items[$list_id[$i]])){
                 $this->items[$list_id[$i]]['quantity'] = $list_quantity[$i];
            }
        }
        session(['cart' => $this->items]);
    }

    public function check_coupon(){
        $coupon = request()->coupon;
        $old_total = $this->total_price;
        $new_total = $old_total - ($old_total*$coupon)/100;
        $this->total_price = $new_total;
        return $new_total;
    }
    public function clear(){
        session(['cart' => []]);
    }
    private function get_total_price(){
        $t = 0;
        foreach($this->items as $item){
            $t += $item['price']*$item['quantity'];
        }
        return $t;
    }
    private function get_total_quantity(){
        $t = 0;
        foreach($this->items as $item){
            $t += $item['quantity'];
        }
        return $t;
    }

}




?>