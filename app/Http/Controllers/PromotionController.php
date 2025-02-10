<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromotionRequest;
use App\Http\Requests\UpdatePromotionRequest;
use App\Models\Promotion;

class PromotionController extends Controller
{
    /**
     * Afficher la liste des promotions
     */
    public function index()
    {
        // Récupérer uniquement les champs nécessaires
        $promotions = Promotion::select('prix_promotion', 'date_debut', 'date_fin')->get();
    
        return response()->json([
            'message' => 'La liste des promotions',
            'Promotions' => $promotions,
        ], 200);
    }
    
    
    /**
     * Ajouter une Promotion
     */
    public function store(StorePromotionRequest $request)
    {
        // Créer une nouvelle promotion en BDD à partir des données du formulaire
        $Promotion = Promotion::create($request->all());

        // Renvoyer un message de confirmation en JSON
        return response() ->json([
           'message' => 'La Promotion a été créée avec succès',
           'Promotion' => $Promotion,
        ],201);
    }

    /**
     * Voir les details d'une Promotion
     */
    public function show($id)
    {
        // Récupérer la promotion en fonction de l'ID
        $promotion = Promotion::find($id);
    
        // Vérifier si la promotion existe
        if (!$promotion) {
            return response()->json([
                'message' => 'promotion non trouvée',
            ], 404);
        }
    
        // Renvoyer les détails de la promotion en JSON
        return response()->json([
            'message' => 'Les détails de la promotion',
            'Promotion' => $promotion,
        ], 200);
    }
    

   

    /**
     * Modifier les informations d'une Promotion
     */
    public function update(UpdatePromotionRequest $request, $id)
    {
        // Récupérer la promotion en fonction de l'ID
        $promotion = Promotion::find($id);
    
        // Vérifier si la promotion existe
        if (!$promotion) {
            return response()->json([
                'message' => 'promotion non trouvée',
            ], 404);
        }
    
        // Mettre à jour les informations de la promotion
        $promotion->update($request->all());
    
        // Renvoyer un message de confirmation en JSON
        return response()->json([
            'message' => 'Les informations de la promotion ont été modifiées avec succès',
            'promotion' => $promotion,
        ], 200);
    }
    

    /**
     * Supprimer une promotion
     */
    public function destroy($id)
    {
        // Récupérer la promotion en fonction de l'ID
        $promotion = Promotion::find($id);
    
        // Vérifier si la promotion existe
        if (!$promotion) {
            return response()->json([
                'message' => 'promotion non trouvée',
            ], 404);
        }
    
        // Supprimer la promotion
        $promotion->delete();
    
        // Renvoyer un message de confirmation en JSON
        return response()->json([
            'message' => 'La promotion a été supprimée avec succès',
        ], 200);
    }
}
