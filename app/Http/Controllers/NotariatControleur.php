<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DossierTerrain;
use App\Models\Notaire;

class NotariatControleur extends Controller
{
    public function index()
    {
        $dossiersTerrain = DossierTerrain::all();
        return view('home.home', ['dossiers' => $dossiersTerrain]);
    }
    

    public function showForm() {
        return view('DossierTerrain.ajouterDossierTerrain');
    }

    public function store(Request $request)
    {

        $request->validate([
            'titre' => 'required|string',
            'cabinet' => 'required|string',
            'numero' => 'required|string'
         
        ]);

     
        $nouveauDossierTerrain = DossierTerrain::create([
            'titre' => $request->input('titre'),
            'cabinet' => $request->input('cabinet'),
            'numero' => $request->input('numero'),
            // Ajoutez d'autres champs au besoin
        ]);

        
        return redirect()->route('dossier_terrain.show')->with('success', 'Dossier terrain ajouté avec succès.');
    }
    
    public function recherche(Request $request)
    {
        $cabinet = $request->input('cabinet');
        $dossiers = DossierTerrain::where('cabinet', 'like', '%' . $cabinet . '%')->get();
        return view('rechercher/rechercher', ['dossiers' => $dossiers]);
    }
    

    
    public function supprimer(Request $request)
{
    $numeros = $request->input('numeros');

    if (is_array($numeros) && count($numeros) > 0) {
        DossierTerrain::whereIn('numero', $numeros)->delete();
        return redirect()->back()->with('success', 'Dossiers supprimés avec succès');
    }

    return redirect()->back()->with('error', 'Aucun dossier sélectionné pour suppression');
}


    public function show(){
        return view('ajouter.ajouter');
    }
    public function verifierForm(){
        return view('verifier.verifier');
    }

 
    public function ajouter(Request $request)
    {
        $request->validate([
            'numn' => 'required|string|regex:/^N.*E$/',
            'email' => 'required|email',
            'age' => 'required|numeric|min:23', 
        ]);

        $notaire = new Notaire();
        $notaire->nom = $request->input('nom');
        $notaire->numn = $request->input('numn');
        $notaire->email = $request->input('email');
        $notaire->age = $request->input('age');
        $notaire->save();

        return redirect()->back()->with('success', 'Notaire ajouté avec succès');
    }

    
    public function verifier(Request $request)
    {
        $numero = $request->input('numero');
        $dossier = DossierTerrain::where('numero', $numero)->first();
    
        if ($dossier) {
            if ($dossier->traite == 1) {
                return redirect()->back()->with('result', 'Le dossier a été traité avec succès.')->with('dossier', $dossier);
            } elseif ($dossier->traite == 0) {
                return redirect()->back()->with('result', 'Le dossier est en cours de traitement.')->with('dossier', $dossier);
            }
        } else {
            return redirect()->back()->with('result', 'Dossier non trouvé.');
        }

    }
    

    public function changerTraitement(Request $request)
    {
   
        $request->validate([
            'numeros' => 'required|array',
        ]);


        $numeros = $request->input('numeros');

    
        foreach ($numeros as $numero) {
            $dossier = DossierTerrain::where('numero', $numero)->first();
            if ($dossier) {
                $dossier->traite = 1; 
                $dossier->save();
            }
        }

        // Set a success message in the session
        return redirect()->back()->with('success', 'Le statut de traitement des dossiers sélectionnés a été mis à jour.');
    }
}
