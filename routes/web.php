<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
}) -> name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


use App\Http\Controllers\AuthenticatedSessionController;
Route::get('/prf', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
Route::post('/logout', [App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');


use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/home', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\ProductController;
Route::resource('produits',ProductController::class);
Route::get('/produit', [productController::class, 'show'])->name('produits.show');
Route::get('produit/details/{id}', [ProductController::class, 'details'])->name('product.details');


route::get('/bienvenue',function(){
    return view ('bonjadmin');
})-> name('bienvenue');
// Tableau de bord pour l'administrateur
//Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth', 'admin');

use App\Http\Controllers\ContactController;


Route::get('/contact/messages', [ContactController::class, 'index'])->name('contact.messages');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact', [ContactController::class, 'for'])->name('contact');













use App\Http\Controllers\PanierController;
Route::resource('paniers',PanierController::class);
Route::post('/panier', [PanierController::class, 'ajouter'])->name('panier.ajouter');
// routes/web.php
Route::get('/panier/count', [PanierController::class, 'getCartCount'])->name('panier.count');





use App\Http\Controllers\CommandeController;
use App\Models\Commande;
Route::get('/commandes/voir', [CommandeController::class, 'voir'])->name('commandes.voir');
Route::get('/commandes/validation', [CommandeController::class, 'validationCommande'])->name('commande.validation');
Route::post('/commande/store', [CommandeController::class, 'store'])->name('commande.store'); // Handles form submission
Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show');
Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->name('commandes.destroy');
