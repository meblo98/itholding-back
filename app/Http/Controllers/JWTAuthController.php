<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class JWTAuthController extends Controller
{
    
    public function register(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mot_de_passe' => 'required|string|min:8',
            'role' => 'required|in:Utilisateur,Livreur,Fournisseur,Admin',
            'telephone' => 'required|string|min:10|max:15',
        ], [
            'nom.required' => 'Le nom est obligatoire.',
            'email.required' => "L'adresse e-mail est obligatoire.",
            'email.email' => "L'adresse e-mail doit être valide.",
            'email.unique' => "Cet e-mail est déjà utilisé.",
            'mot_de_passe.required' => 'Le mot de passe est obligatoire.',
            'mot_de_passe.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'role.required' => 'Le rôle est obligatoire.',
            'role.in' => 'Le rôle doit être Utilisateur, Livreur, Fournisseur ou Admin.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'telephone.min' => 'Le numéro de téléphone doit contenir au moins 10 chiffres.',
            'telephone.max' => 'Le numéro de téléphone ne doit pas dépasser 15 chiffres.',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'mot_de_passe' => Hash::make($request->mot_de_passe),
            'role' => $request->role,
            'telephone' => $request->telephone,
        ]);

        return response()->json(['token' => $user->createToken('API Token')->plainTextToken]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'mot_de_passe' => 'required|string',
        ], [
            'email.required' => "L'adresse e-mail est obligatoire.",
            'email.email' => "L'adresse e-mail doit être valide.",
            'mot_de_passe.required' => 'Le mot de passe est obligatoire.',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->mot_de_passe, $user->mot_de_passe)) {
            throw ValidationException::withMessages([
                'email' => ["Les informations d'identification fournies sont incorrectes."],
            ]);
        }

        return response()->json(['token' => $user->createToken('API Token')->plainTextToken]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Déconnexion réussie.']);
    }

    public function user(Request $request)
    {
        return response()->json($request->user());
    }


}
