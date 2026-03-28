<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
class ProduitController extends Controller
{
   public function index()
    {
        $produits = Produit::all();
        return view('produits', compact('produits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prix' => 'required|numeric',
            'categorie' => 'required',
        ]);

        Produit::create($request->all());
        return redirect()->route('produits.index')->with('success', 'Produit créé avec succès.');
    }
}
