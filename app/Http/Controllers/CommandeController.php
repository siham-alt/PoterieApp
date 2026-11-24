<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\CommandeDetails;
use Illuminate\Support\Facades\Auth;
use App\Models\Panier;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
     public function index()
{
    // Récupérer toutes les commandes avec les informations des utilisateurs
    $commandes = Commande::with('user')->get();

    return view('commande.index', compact('commandes'));
}



    public function validationCommande()
{
    $userId = auth()->id();

    // Récupérez les éléments du panier avec les produits associés
    $panier = Panier::with('product')->where('user_id', $userId)->get();

    if ($panier->isEmpty()) {
        return redirect()->route('panier.index')->with('error', 'Votre panier est vide.');
    }

    // Affiche la page de confirmation
    return view('commande.confirmation', compact('panier'));
}










        public function voir()
    {
        // Récupère les commandes de l'utilisateur connecté avec leurs détails
        $commandes = auth()->user()->commandes()->with('details.product')->get();

        return view('commande.voir', compact('commandes'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
    
        // Récupérer le panier de l'utilisateur
        $panier = Panier::where('user_id', $user->id)->with('product')->get();
    
        // Vérifier si le panier est vide
        if ($panier->isEmpty()) {
            return redirect()->back()->with('error', 'Votre panier est vide.');
        }
    
        // Vérification si la quantité dans le panier dépasse le stock disponible
        foreach ($panier as $item) {
            // Si la quantité demandée dépasse la quantité existante en stock
            if ($item->quantite > $item->product->nb_existant) {
                return redirect()->route('paniers.index')->with('error', 'La quantité demandée pour le produit "' . $item->product->nom . '" dépasse le stock disponible.');
            }
        }
    
        // Créer une commande
        $commande = Commande::create([
            'user_id' => Auth::id(),
            'total' => $panier->sum(function ($item) {
                return $item->product->prix * $item->quantite;
            }),
            'adresse' => $request->input('adresse'), // Vérifiez que 'adresse' est transmis
            'ville' => $request->input('ville'),
            'code_postal' => $request->input('code_postal'),
            'mode_livraison' => $request->input('mode_livraison'),
            'statut' => 'En attente',
        ]);
    
        // Ajouter les détails de la commande
        foreach ($panier as $item) {
            // Mise à jour du stock après la commande
            $item->product->nb_existant -= $item->quantite;
            $item->product->save();
    
            CommandeDetails::create([
                'commande_id' => $commande->id,
                'product_id' => $item->product_id,
                'quantite' => $item->quantite,
                'prix' => $item->product->prix,
            ]);
        }
    
        // Vider le panier
        Panier::where('user_id', $user->id)->delete();
    
        // Rediriger vers la vue des commandes avec un message de succès
        return redirect()->route('commandes.voir')->with('success', 'Votre commande a été passée avec succès.');
    }
    
    
    
      
        

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Récupérer la commande avec ses détails et l'utilisateur associé
        $commande = Commande::with(['details.product', 'user'])->findOrFail($id);
    
        return view('commande.show', compact('commande'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Trouver la commande par son ID
        $commande = Commande::findOrFail($id);
    
        // Supprimer les détails de la commande
        $commande->details()->delete();
    
        // Supprimer la commande elle-même
        $commande->delete();
    
        // Rediriger avec un message de succès
        return redirect()->route('commandes.index')->with('success', 'La commande a été supprimée avec succès.');
    }
    
}
