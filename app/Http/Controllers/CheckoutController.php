<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

class CheckoutController extends Controller
{
    public function storeOrder(Request $request)
    {
        $product = session('cart');
        if(!Auth::user()){
        Order::create([
            'order_number' => now(),
            'status' => '0',
            'grand_total' => $request->total,
            'item_count' => count($product),
            'payment_status' => 'Unpaid',
            'payment_method' => $request->payment_name,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'post_code' => $request->post_code,
            'phone_number' => $request->phone_no,
            'email' => $request->email,
            'notes' => $request->notes
        ]);
         }else{
            $user = Auth::user();
            Order::create([
                'order_number' => now(),
                'status' => '0',
                'grand_total' => $request->total,
                'item_count' => count($product),
                'payment_status' => 'Unpaid',
                'payment_method' => $request->payment_name,
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
                'address' => '',
                'city' => '',
                'country' => '',
                'post_code' => '',
                'phone_number' => '',
                'email' => $user->email,
                'notes' => ''
            ]); 
         }

         return 'https://www.paypal.com/ke/signin';
    }
}
