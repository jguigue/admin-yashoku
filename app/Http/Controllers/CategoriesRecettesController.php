<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoriesRecettes;

class CategoriesRecettesController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categoriesrecettes = CategoriesRecettes::latest()->paginate(5);
        return view('categoriesrecettes.index', compact('categoriesrecettes'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('categoriesrecettes.create');
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
            'nom_categorie' => 'required',
        ]);
        
        CategoriesRecettes::create($request->post());

        return redirect()->route('categoriesrecettes.index')->with('success','categoriesrecettes has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\categoriesrecettes  $categoriesrecette
    * @return \Illuminate\Http\Response
    */
    public function show(categoriesrecettes $categoriesrecette)
    {
        return view('categoriesrecettes.show',compact('categoriesrecettes'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\categoriesrecettes  $categoriesrecette
    * @return \Illuminate\Http\Response
    */
    public function edit(categoriesrecettes $categoriesrecette)
    {
        return view('categoriesrecettes.edit',compact('categoriesrecettes'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\categoriesrecettes  $categoriesrecette
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, categoriesrecettes $categoriesrecette)
    {
        $request->validate([
            'nom_categorie' => 'required',
        ]);
        
        $categoriesrecette->fill($request->post())->save();

        return redirect()->route('categoriesrecettes.index')->with('success','categoriesrecettes Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\categoriesrecettes  $categoriesrecette
    * @return \Illuminate\Http\Response
    */
    public function destroy(categoriesrecettes $categoriesrecette)
    {
        $categoriesrecette->delete();
        return redirect()->route('categoriesrecettes.index')->with('success','categoriesrecettes has been deleted successfully');
    }
}