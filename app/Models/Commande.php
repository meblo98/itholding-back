<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    //

    protected $guarded = [];
    
       /**
     * Relation many-to-one : Une commande appartient à un utilisateur.
     */
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
