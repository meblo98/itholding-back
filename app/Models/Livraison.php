<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    /** @use HasFactory<\Database\Factories\LivraisonFactory> */
    use HasFactory;

    protected $guarded = [];
     /**
     * Relation many-to-one : Une livraison est livrée par  un utilisateur.
     */
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Relation one-to-one : Une livraison est associée à une commande unique.
     */
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }

    /**
     * Relation one-to-one : Une commande peut avoir une seule livraison associée.
     */
    public function livraison()
    {
        return $this->hasOne(Livraison::class);
    }
}
