<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Utilisateur connecté ou null
        
        // Si l'utilisateur est un admin, rediriger vers le tableau de bord
        if ($user && $user->role == 'admin') {
            return redirect()->route('dashboard');
        }
        
        $featuredProducts = Product::latest()->take(4)->get(); // Récupère les 4 derniers produits ajoutés

        return view('welcome', compact('user','featuredProducts')); // Retourner la vue d'accueil avec l'utilisateur
    }

    public function home()
    {
        return view('welcome'); // Vue pour l'utilisateur normal
    }

    public function dashboard()
    {
        return view('dashboard'); // Vue pour l'administrateur
    }
}



