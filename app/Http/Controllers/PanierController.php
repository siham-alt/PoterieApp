<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Product;
use Auth;

class PanierController extends Controller
{
   public function ajouter(Request $request)
{
    $validated = $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantite' => 'required|integer|min:1',
    ]);

    Panier::create([
        'user_id' => auth()->id(),
        'product_id' => $validated['product_id'],
        'quantite' => $validated['quantite'],
    ]);

    return redirect()
        ->route('product.details', ['id' => $validated['product_id']])
        ->with('success', 'Produit ajouté au panier.');
}

    
        public function index()
{  $userId = auth()->id(); // ID de l'utilisateur connecté

    // Récupérez les éléments du panier avec les produits associés
    $panier = Panier::with('product')->where('user_id', $userId)->get();

    return view('panier.index', compact('panier'));
}

    
    // Méthode pour obtenir le nombre d'articles dans le panier
    public function getCartCount()
    {
      
    $userId = Auth::id();
    $count = Panier::where('user_id', $userId)->sum('quantite');
    return response()->json(['count' => $count]);
    }



 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
        public function update(Request $request, $id)
{
    $request->validate([
        'quantite' => 'required|integer|min:1'
    ]);

    $panier = Panier::find($id);
    $panier->quantite = $request->quantite;
    $panier->save();

    return back()->with('success', 'Quantité mise à jour.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $panier = Panier::findOrFail($id);
        $panier->delete();
    
        return back()->with('success', 'Produit supprimé du panier.');
    }
    
}
