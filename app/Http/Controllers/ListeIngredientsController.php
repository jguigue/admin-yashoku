<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListeIngredients;
use App\Models\CategoriesIngredients;

class ListeIngredientsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $listeingredients = ListeIngredients::with('categories')->latest()->paginate(10);
        $categoriesingredients = CategoriesIngredients::all();
        return view('liste-ingredients.index', compact('categoriesingredients', 'listeingredients'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $categoriesingredients = CategoriesIngredients::all();
        return view('liste-ingredients.create', compact('categoriesingredients', 'listeingredients'));
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
            'nom_ingredient' => 'required',
            'type_quantite' => 'required',
            'categorie_id' => 'required|exists:App\Models\CategoriesIngredients,id',
        ]);
        ListeIngredients::create([
            'nom_ingredient' => $request->nom_ingredient,
            'type_quantite' => $request->type_quantite,
            'categorie_id' => $request->categorie_id,
        ]);

        return redirect()->route('liste-ingredients.index')->with('success','listeingredients has been created successfully.');
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\listeingredients  $listeingredient
    * @return \Illuminate\Http\Response
    */
    public function show(listeingredients $listeingredient)
    {
        return view('liste-ingredients.show',compact('listeingredients'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\listeingredients  $listeingredient
    * @return \Illuminate\Http\Response
    */
    public function edit(listeingredients $listeingredient)
    {
        $categoriesingredients = CategoriesIngredients::all();
        return view('liste-ingredients.edit',compact('listeingredients'));
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\listeingredients  $listeingredient
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, listeingredients $listeingredient)
    {
        $request->validate([
            'nom_ingredient' => 'required',
            'type_quantite' => 'required',
            'categorie_id' => 'required|exists:App\Models\CategoriesIngredients,id',
        ]);
            $post-> nom_ingredient = $request->nom_ingredient;
            $post-> type_quantite = $request->type_quantite;
            $post-> categorie_id = $request->categorie_id;
            $post->save();

        
        $listeingredient->fill($request->post())->save();

        return redirect()->route('liste-ingredients.index')->with('success','listeingredients Has Been updated successfully');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\listeingredients  $listeingredient
    * @return \Illuminate\Http\Response
    */
    public function destroy(listeingredients $listeingredient)
    {
        $listeingredient->delete();
        return redirect()->route('liste-ingredients.index')->with('success','listeingredients has been deleted successfully');
    }
}