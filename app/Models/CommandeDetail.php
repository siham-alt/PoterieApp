<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeDetail extends Model
{
    protected $fillable = [
        'commande_id', 
        'product_id', 
        'quantite', 
        'prix',
    ];

    // Relation inverse avec la commande
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    // Relation avec le produit
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
