<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories'; 
    public function produits(){
        return $this->hasMany(Product::class);
    }
}
