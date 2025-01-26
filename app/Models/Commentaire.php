<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{

    //

    protected $guarded = [];

     /**
     * Relation one-to-many : Un commentaire est ajouté par un utilisateur.
     */
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation one-to-many : Un commentaire est lié à un seul produit.
     */
    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
