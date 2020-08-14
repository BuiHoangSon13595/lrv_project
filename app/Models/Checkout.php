<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_detail;
use Mail;
use PDF;

class Checkout extends Model
{
    public function __construct(){
        $this->middleware('client');
    }
    public static function checkout($req,$cart){
        $c_id = \Auth::guard('client')->user();
        $c_name = $req->name;
        $order = Order::create([
            'client_id' => $c_id->id,
            'total_amount' => $cart->total_price,
            'name' =>$c_id->name,
            'address' => $req->address.'-'.$req->calc_shipping_district.'-'.$req->calc_shipping_provinces,
            'phone'=> $req->phone,
            'payment_id'=> $req->payment_id,
            'shipping_id'=> $req->shipping_id,
        ]);
        if ($order) {
            $order_id = $order->id;
            foreach ($cart->items as $item) {
                Order_detail::create([
                    'order_id' =>  $order_id,
                    'product_detail_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            };
            $email = $req->email;
            $data = [
                'order'=> $order,
                'items'=> $cart->items,
                'c_name' => $c_name,
                'c'=>$c_id
            ];
            $pdf = PDF::loadView('email.order_email',$data);
            Mail::send('email.order_success', $data, function($message) use($email,$pdf){
                $message->to($email, 'Visitor')->subject('Order Details')->attachData($pdf->output(),'order.pdf',['mime'=>'application/pdf']);
            });
            session(['cart' => '']);
            return true;
        }else{
            return false;
        }
    }
}
