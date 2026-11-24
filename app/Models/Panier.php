<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;

    // Définir la table associée
    protected $table = 'paniers';

    // Définir les attributs qui peuvent être affectés en masse
    protected $fillable = [
        'product_id',
        'user_id',
        'quantite',
    ];

    // Relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le modèle Produit
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id'); // Un produit associé à cet élément du panier
    }



}