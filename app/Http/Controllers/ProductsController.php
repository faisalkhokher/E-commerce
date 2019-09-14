<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use App\Category;

use Session;

use Auth; 


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = auth() -> user() -> products ;  
        return view ('products.index')->with(compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // $categories = Category::all();

        return view('products.create')->with('categories' , Category::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate 
        $this -> validate ($request , [
            'name'         => 'required|max:255' ,
            'price'        =>  'required' , 
            'category_id'  => 'required' ,
            'image'        =>   'required|image' , 
            'description'  => 'required',
           

        ]); 


    // Image Save On local drive and db 
    
    // Todo First Get the image from the  requesst . . 
    $image = $request -> image;

    $image_new_name = time() . $image->getClientOriginalName();

    $image -> move('uploads/image' , $image_new_name);


    //    Create Products
    Product::create ([
   
        'name'          => $request -> name , 
        'price'         => $request -> price , 
        'image'         => 'uploads/image/'  . $image_new_name , 
        'description'   => $request -> description , 
        'category_id'   => $request -> category_id , 
        'user_id'       => Auth::user() -> id
    
    ]);


    session()->flash('success', 'Post Created Successfuly');

    return redirect (route ('product.index'));


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view ('products.edit')->with('products' , $product)->with('category' , Category::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // req form id 
        $product = Product::find($id);

        // Update image 
        if ($request -> hasfile ('image')) {
            # code...
            // req date form img 
            $image = $request -> image ; 
            // Save name 
            $image_new_name = time().$image->getClientOriginalName();
            // Moving.... 
            $image -> move('uploads/image/' , $image_new_name );
            // saving... 
            $product -> image = 'uploads/image/' . $image_new_name ; 
        }

        // Todo >>> NoW save other values ...   
        $product -> name = $request -> name ; 
        $product -> price  =  $request ->  price ; 
        $product -> description  =  $request -> description;
        $product -> category_id  = $request -> category_id;
        

        // Save
       $product -> save();

       session()->flash('success', 'Update Values Successfuly');
       return redirect (route ('product.index'));
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);

        if(file_exists($product -> image))
        {
            unlink($product -> image);
        }
        

        $product -> delete();

        // 
       session()->flash('error', 'Record Deleted Successfuly');

       return redirect (route ('product.index'));
    }


    
}
