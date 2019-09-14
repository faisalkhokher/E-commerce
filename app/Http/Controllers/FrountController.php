<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

class FrountController extends Controller
{
    //

    public function index()
    {
        return view('index', ['product' => Product::paginate(3)])
        ->with('cat', Category::take(4)->get());
    }

    public function single ($id) 
    {
        return view ('single')->with('product' , Product::find($id) )
        ->with('cat', Category::take(4)->get());;
    }


 
}
