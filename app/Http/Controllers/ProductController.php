<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Categorie;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
{
    $products = Product::orderBy('created_at', 'DESC')->get();
    return view('Product.index', compact('products'));  // Modifiez ici pour utiliser compact
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('Product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'nb_existant' => 'required|integer',
            'categories_id' => 'required|exists:categories,id',  // Modifiez ici
        ];
    
        if ($request->hasFile('image')) {
            $rules['image'] = 'image';
        }
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $product = new Product();
        $product->nom = $request->nom;
        $product->description = $request->description;
        $product->prix = $request->prix;
        $product->nb_existant = $request->nb_existant;
        $product->categories_id = $request->categories_id; // Utilisez 'categories_id'
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $image->move(public_path('uploads/Product'), $imageName);
            $product->image = $imageName;
        }
    
        $product->save();
    
    return redirect('/produits')->with('success', 'Produit ajouté avec succès');
}


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $query = Product::query(); // Crée une requête de base pour les produits
        $categories = Categorie::all(); // Récupère toutes les catégories
    
        // Appliquer le filtre par catégorie si présent
        if ($request->has('category') && $request->category) {
            $query->where('categories_id', $request->category);
        }
    
        // Paginer les résultats
        $products = $query->paginate(9);
    
        // Retourner la vue avec les produits et les catégories
        return view('Product.show', compact('products', 'categories'));
    }
    




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Categorie::all();
return view('Product.edit', compact('product', 'categories'));
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $rules = [
            'nom' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'nb_existant' => 'required|integer',
            'categories_id' => 'required|exists:categories,id',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->nom = $request->nom;
        $product->description = $request->description;
        $product->prix = $request->prix;
        $product->nb_existant = $request->nb_existant;
        $product->categories_id = $request->categories_id;


        if ($request->hasFile('image')) {
            if ($product->image && File::exists(public_path('uploads/Product/' . $product->image))) {
                File::delete(public_path('uploads/Product/' . $product->image));
            }

            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $image->move(public_path('uploads/Product'), $imageName);
            $product->image = $imageName;
        }

        $product->save();

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->image && File::exists(public_path('uploads/Product/' . $product->image))) {
            File::delete(public_path('uploads/Product/' . $product->image));
        }

        $product->delete();
        return redirect('/produits')->with('success', 'Produit supprimé avec succès');
    }


    public function details($id)
{
    $product = Product::findOrFail($id);
    
    // Fetch related products by category (excluding the current product)
    $relatedProducts = Product::where('categories_id', $product->categories_id)
    ->where('id', '!=', $id)
    ->take(4)
    ->get();


    // Return the view and pass the product and related products to it
    return view('product.details', compact('product', 'relatedProducts'));
}





}
