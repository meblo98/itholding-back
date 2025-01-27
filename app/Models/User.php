<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $guarded = [];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

   

    public function getJWTCustomClaims()
    {
        return [];
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'mot_de_passe',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'mot_de_passe' => 'hashed',
        ];
    }

     /**
     * Relation one-to-many: Un utilisateur peut ajouter plusieurs produits.
     */
    public function produits()
    {
        return $this->hasMany(Produit::class, 'user_id');
    }

      /**
     * Relation one-to-many: Un utilisateur peut commenter plusieurs fois.
     */
    public function commentaires()
    {
        return $this->hasMany(Commentaire::class, 'user_id');
    }

    /**
     * Relation many-to-many : Un utilisateur peut commander plusieurs produits via la table pivot 'commandes'.
     */
    public function commandes()
    {
        return $this->belongsToMany(Produit::class, 'commandes')
                    ->withPivot('statut', 'created_at', 'updated_at');
    }

     /**
     * Relation one-to-many: Un utilisateur peut livrer plusieurs livraisons.
     */
    public function livraisons()
    {
        return $this->hasMany(Livraison::class, 'user_id');
    }
}
