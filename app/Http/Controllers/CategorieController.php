<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Models\Categorie;

class CategorieController extends Controller
{
    /**
     * Afficher la liste des categories
     */
    public function index()
    {
        // Récupérer uniquement les noms des catégories
        $categories = Categorie::pluck('nom');
    
        return response()->json([
            'message' => 'La liste des catégories',
            'categories' => $categories,
        ], 200);
    }
    
    /**
     * Ajouter une categorie
     */
    public function store(StoreCategorieRequest $request)
    {
        // Créer une nouvelle catégorie en BDD à partir des données du formulaire
        $categorie = Categorie::create($request->all());

        // Renvoyer un message de confirmation en JSON
        return response() ->json([
           'message' => 'La categorie a été créée avec succès',
           'categorie' => $categorie,
        ],201);
    }

    /**
     * Voir les details d'une categorie
     */
    public function show($id)
    {
        // Récupérer la catégorie en fonction de l'ID
        $categorie = Categorie::find($id);
    
        // Vérifier si la catégorie existe
        if (!$categorie) {
            return response()->json([
                'message' => 'Catégorie non trouvée',
            ], 404);
        }
    
        // Renvoyer les détails de la catégorie en JSON
        return response()->json([
            'message' => 'Les détails de la catégorie',
            'categorie' => $categorie,
        ], 200);
    }
    

   

    /**
     * Modifier les informations d'une categorie
     */
    public function update(UpdateCategorieRequest $request, $id)
    {
        // Récupérer la catégorie en fonction de l'ID
        $categorie = Categorie::find($id);
    
        // Vérifier si la catégorie existe
        if (!$categorie) {
            return response()->json([
                'message' => 'Catégorie non trouvée',
            ], 404);
        }
    
        // Mettre à jour les informations de la catégorie
        $categorie->update($request->all());
    
        // Renvoyer un message de confirmation en JSON
        return response()->json([
            'message' => 'Les informations de la catégorie ont été modifiées avec succès',
            'categorie' => $categorie,
        ], 200);
    }
    

    /**
     * Supprimer une catégorie
     */
    public function destroy($id)
    {
        // Récupérer la catégorie en fonction de l'ID
        $categorie = Categorie::find($id);
    
        // Vérifier si la catégorie existe
        if (!$categorie) {
            return response()->json([
                'message' => 'Catégorie non trouvée',
            ], 404);
        }
    
        // Supprimer la catégorie
        $categorie->delete();
    
        // Renvoyer un message de confirmation en JSON
        return response()->json([
            'message' => 'La catégorie a été supprimée avec succès',
        ], 200);
    }
    
}
