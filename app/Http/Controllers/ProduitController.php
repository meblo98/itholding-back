<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProduitRequest;
use App\Http\Requests\UpdateProduitRequest;
use App\Models\Produit;

class ProduitController extends Controller
{
   
    /**
     * Afficher la liste des produits
     */
    public function index()
    {
        // Récupérer uniquement les champs nécessaires
        $produits = Produit::pluck('nom');
    
        return response()->json([
            'message' => 'La liste des produits',
            'produits' => $produits,
        ], 200);
    }
    
    
    /**
     * Ajouter une produit
     */
    public function store(StoreProduitRequest $request)
    {
        // Créer une nouvelle produit en BDD à partir des données du formulaire
        $produit = Produit::create($request->all());

        // Renvoyer un message de confirmation en JSON
        return response() ->json([
           'message' => 'La produit a été créée avec succès',
           'produit' => $produit,
        ],201);
    }

    /**
     * Voir les details d'une produit
     */
    public function show($id)
    {
        // Récupérer la produit en fonction de l'ID
        $produit = Produit::find($id);
    
        // Vérifier si la produit existe
        if (!$produit) {
            return response()->json([
                'message' => 'produit non trouvée',
            ], 404);
        }
    
        // Renvoyer les détails de la produit en JSON
        return response()->json([
            'message' => 'Les détails de la produit',
            'produit' => $produit,
        ], 200);
    }
    

   

    /**
     * Modifier les informations d'une produit
     */
    public function update(UpdateProduitRequest $request, $id)
    {
        // Récupérer la produit en fonction de l'ID
        $produit = Produit::find($id);
    
        // Vérifier si la produit existe
        if (!$produit) {
            return response()->json([
                'message' => 'produit non trouvée',
            ], 404);
        }
    
        // Mettre à jour les informations de la produit
        $produit->update($request->all());
    
        // Renvoyer un message de confirmation en JSON
        return response()->json([
            'message' => 'Les informations de la produit ont été modifiées avec succès',
            'produit' => $produit,
        ], 200);
    }
    

    /**
     * Supprimer une produit
     */
    public function destroy($id)
    {
        // Récupérer la produit en fonction de l'ID
        $produit = Produit::find($id);
    
        // Vérifier si la produit existe
        if (!$produit) {
            return response()->json([
                'message' => 'produit non trouvée',
            ], 404);
        }
    
        // Supprimer la produit
        $produit->delete();
    
        // Renvoyer un message de confirmation en JSON
        return response()->json([
            'message' => 'La produit a été supprimée avec succès',
        ], 200);
    }
}
