<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    /** @use HasFactory<\Database\Factories\CategorieFactory> */
    use HasFactory;

    protected $guarded = [];

      /**
     * Relation one-to-many: Une catégorie  peut contenir plusieurs produits.
     */
    public function produits()
    {
        return $this->hasMany(Produit::class, 'categorie_id');
    }
}
