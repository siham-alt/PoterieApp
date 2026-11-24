<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total',
        'adresse',
        'ville',
        'code_postal',
        'mode_livraison',
        'statut',
    ];
    public function details()
    {
        return $this->hasMany(CommandeDetails::class, 'commande_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
