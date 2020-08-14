<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\Product;
// use App\Models\Product_detail;
// use App\Models\Product_image;
class CartController extends Controller
{
    public function view(){
        return view('cart');
    }

    public function add(Request $request,CartHelper $cart){
        $product = Product::find($request->id);
        $cart->add($product,$request->quantity);
        return redirect()->back();
    }

    public function remove($id,CartHelper $cart){
        $cart->remove($id);
        return redirect()->back();
    }
    
    public function update(CartHelper $cart){
        $cart->update();
        return redirect()->back();
    }
    public function coupon(CartHelper $cart){
        $cart->check_coupon();
        return redirect()->back();
    }
    
    public function clear(CartHelper $cart){
        $cart->clear();
        return redirect()->back();
    }
    
}
