<?php

namespace App\Http\Controllers;

use Cart;

use App\Product;

use App\Category;

use Session;

use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    //

    public function index() 
    {   
        $pdt = Product::find(request()-> pdt_id);

        $cartItem = Cart::add([
            'id' => $pdt-> id,
            'name' => $pdt-> name,
            'qty' => request()->  qty,
            'price' => $pdt-> price
        ]);
        session()->flash('success', 'Product added to cart.');
        Cart::associate($cartItem-> rowId, 'App\Product');
      

        return redirect()->route('cart');
        // The tax() method can be used to get the calculated amount of tax for all items in the cart, given there price and quantity
    }

     public function cart()
     {
        //  Cart::destroy();
         return view ('cart')->with('cat', Category::take(4)->get())->
         with('category' , Category::all());
    
     }

     public function delete($id)
     {
        //  This fun is delete cart from 
         Cart::remove($id);
         session()->flash('success', 'Remove Cart');
         return redirect()->back();
     }


    //  Cart Reduce 
    public function reduce($id ,$qty)
    {
        Cart::update($id , $qty - 1);

        return redirect()->back();
    }

    public function increment($id ,$qty)
    {
        Cart::update($id , $qty  +  1);

        return redirect()->back();
    }


    public function rapid_add($id)
    {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt-> id,
            'name' => $pdt-> name,
            'qty' => 1,
            'price' => $pdt-> price
        ]);

        Cart::associate($cartItem-> rowId, 'App\Product');

        Session::flash('success', 'Product added to cart.');

        return redirect()->route('cart');
    }
}
