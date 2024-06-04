<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkoutPage(){
        return view('public.checkout.checkout');
    }

    public function process(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:11',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
            'payment_method' => 'required|in:Gcash,PayPal,MayaPay',
        ]);
        
        return redirect()->route('checkout.order_confirmed');
    }



    public function success(){
        return view('public.checkout.order_confirmed');
    }
}

