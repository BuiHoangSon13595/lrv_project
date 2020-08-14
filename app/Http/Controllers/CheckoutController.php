<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Http\Requests\home\CheckoutRequest;
use App\Models\Checkout;

class CheckoutController extends Controller
{
    
    public function submit(CheckoutRequest $req, CartHelper $cart){
        $check = Checkout::checkout($req,$cart);
        if($check){
            return redirect()->route('checkout_success')->with('checkout_success','Thank you for your purchase!!');
        }else{
            return redirect()->back()->with('error','Order failed!!');
        }
    }
    
}
