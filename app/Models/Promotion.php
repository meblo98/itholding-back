<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    /** @use HasFactory<\Database\Factories\PromotionFactory> */
    use HasFactory;
    
    protected $guarded = [];

     /**
     * Relation one-to-many: Une promoation peut concerner plusieurs produits.
     */
    public function produits()
    {
        return $this->hasMany(Produit::class, 'promotion_id');
    }
    
}
