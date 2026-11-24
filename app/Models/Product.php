<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $fillable = [
        'nom', 'description', 'prix', 'nb_existant', 'categories_id', 'image'  // Utilisez 'categories_id' ici
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categories_id'); // Utilisez 'categories_id' ici
    }
    public function paniers()
    {
        return $this->hasMany(Panier::class, 'product_id');
    }
   
    
}
