<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Stripe\Charge;

use Cart;

use Stripe\Stripe; 

use Session;


class CheckoutController extends Controller
{
    //
    public function index()
    {
        if(Cart::content()->count() == 0)
        {
            Session::flash('info', 'Your cart is still empty. do some shopping');
            return redirect()->back();
        }
        return view ('checkout');
    }
    public function pay()
    {
     
    // 
     Stripe::setApiKey('STRIPE_API_KEY');

     $token = request() -> stripeToken;

     $charge = Charge::create([
        'amount' => Cart::total() * 100,
        'currency' => 'usd',
        'description' => 'Products',
        'source' => request()-> stripeToken
    ]);

     session()->flash('success', 'Purchase successfull. wait for our email.');

    Cart::destroy();
    
    return redirect('/');

    }
}
