<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    //
    protected $guarded = [];

      /**
     * Relation inverse one-to-many: Un produit est ajouté par  un utilisateur.
     */
    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

      /**
     * Relation one-to-many: Un produit peut avoir plusieurs commentaires.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'produit_id');
    }

      /**
     * Relation inverse one-to-many: Pour un produit on applique qu'une seule promotion.
     */
    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_id');
    }

     /**
     * Relation inverse one-to-many: Un produit est ajouté dans une catégorie.
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

     /**
     * Relation one-to-many: Un utilisateur peut avoir plusieurs images.
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'produit_id');
    }
     /**
     * Relation many-to-many : Un produit peut être commandé par plusieurs utilisateurs via la table pivot 'commandes'.
     */
    public function commandes()
    {
        return $this->belongsToMany(User::class, 'commandes')
                    ->withPivot('statut', 'created_at', 'updated_at');
    }
}
