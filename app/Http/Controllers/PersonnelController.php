<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonnelController extends Controller
{    
    function enregistrerPersonnel(Request $request){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'photo'=>'required|image',
            'telephone'=>'required',
            'adresse'=>'required',
            'profil'=>'required',
        ]);

        $nom = $request->nom;
        $prenom = $request->prenom;
        $photo = $request->file('photo');
        $photoName = time().'.'.$photo->extension();
        $photo->move(public_path('images'),$photoName);
        $telephone = $request->telephone;
        $adresse = $request->adresse;
        $profile = $request->profile;

        $personnels = new Utilisateur();
        $personnels->nom = $nom;
        $personnels->prenom = $prenom;
        $personnels->photo = $photoName; 
        $personnels->telephone = $telephone; 
        $personnels->adresse = $adresse; 
        $personnels->profile = $profile;
        $personnels->save();
        return back()->with('personnel_ajoute', 'Le personnel à été ajouté avec success');
        
    }
    public function ajout(){
        return view('personnels.ajout_personnel');
    }

    public function ensemble_personnels(){
        $personnels = Utilisateur::all();
        return view('personnels.tous_les_personnels',compact('personnels'));
    }

    public function modifierPersonnel($idUtilisateur){
        $personnels = Utilisateur::find($idUtilisateur);
        return view('personnels.modifier_personnel',compact('personnels'));
    }

    public function mise_a_jour(Request $request){
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'photo'=>'required|image',
            'telephone'=>'required',
            'adresse'=>'required',
            'profil'=>'required',
        ]);

        $nom = $request->nom;
        $prenom = $request->prenom;
        $photo = $request->file('photo');
        $photoName = time().'.'.$photo->extension();
        $photo->move(public_path('images'),$photoName);
        $telephone = $request->telephone;
        $adresse = $request->adresse;
        $profile = $request->profile;

        $personnels = Utilisateur::find($request->idUtilisateur);
        $personnels->nom = $nom;
        $personnels->prenom = $prenom;
        $personnels->photo = $photoName; 
        $personnels->telephone = $telephone; 
        $personnels->adresse = $adresse; 
        $personnels->profile = $profile;
        $personnels->save();
        return back()->with('personnel_a_jour', 'La mise a jour a réussi !');

    }

    public function supprimer_personnel($idUtilisateur){
        $personnels = Utilisateur::find($idUtilisateur);
        unlink(public_path('images').'/'.$personnels->photo);
        $personnels->delete();
        return back()->with('personnel_supprimer', 'Suppression effectuée avec success !');

    }
}
