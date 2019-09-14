<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;




class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('category.index')->with('category'  , Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //

        $this -> validate ($request , [

            'name'  => 'required' , 

        ]);

        $category = Category::create ([

            'name'  => $request -> name

        ]);
   
        session()->flash('success', 'Created Record . . ');

        return redirect (route('cat.index'));
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
        $category = Category::find($id);
        return view ('category.edit')->with('category' , $category);
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
        //

        $this -> validate ($request ,  [

            'name'  => 'required' 

        ]);


        $category = Category::find($id);
        $category -> name = $request -> name ; 
        $category -> save();

        session()->flash('success', 'Record Updated');
        return redirect (route ('cat.index'));
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
        $cat = Category::find($id);

        $cat -> delete();

      session()->flash('success', 'Record Delete');
        return redirect (route ('cat.index'));
    }
}
