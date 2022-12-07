<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesIngredients;

class CategoriesIngredientsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categoriesingredients = CategoriesIngredients::latest()->paginate(5);
        return view('categoriesingredients.index', compact('categoriesingredients'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('categoriesingredients.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        CategoriesIngredients::create($request->post());

        return redirect()->route('categoriesingredients.index')->with('success','CategoriesIngredients has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\CategoriesIngredients  $categoriesingredient
    * @return \Illuminate\Http\Response
    */
    public function show(CategoriesIngredients $categoriesingredient)
    {
        return view('categoriesingredients.show',compact('CategoriesIngredients'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\CategoriesIngredients  $categoriesingredient
    * @return \Illuminate\Http\Response
    */
    public function edit(CategoriesIngredients $categoriesingredient)
    {
        return view('categoriesingredients.edit',compact('CategoriesIngredients'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\CategoriesIngredients  $categoriesingredient
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, CategoriesIngredients $categoriesingredient)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);
        
        $categoriesingredient->fill($request->post())->save();

        return redirect()->route('categoriesingredients.index')->with('success','CategoriesIngredients Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\CategoriesIngredients  $categoriesingredient
    * @return \Illuminate\Http\Response
    */
    public function destroy(CategoriesIngredients $categoriesingredient)
    {
        $categoriesingredient->delete();
        return redirect()->route('categoriesingredients.index')->with('success','CategoriesIngredients has been deleted successfully');
    }
}