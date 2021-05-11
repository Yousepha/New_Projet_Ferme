<?php

namespace App\Http\Controllers;

use App\Models\Bovin;
use App\Models\Vache;
use App\Models\Taureau;
use App\Models\Veau;
use App\Models\Velle;
use App\Models\Genisse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BovinController extends Controller
{
    
    // function enregistrerBovin(Request $request){
    //     $request->validate([
    //         'codeBovin'=>'required',
    //         'nom'=>'required',
    //         'etat'=>'required',
    //         'photo'=>'required|image',
    //         'dateNaissance'=>'required',
    //         'etatDeSante'=>'required',
    //         'geniteur'=>'required',
    //         'genitrice'=>'required'
    //     ]);

    //     $codeBovin = $request->codeBovin;
    //     $nom = $request->nom;
    //     $etat = $request->etat;
    //     $photo = $request->file('photo');
    //     $photoName = time().'.'.$photo->extension();
    //     $photo->move(public_path('images'),$photoName);
    //     $dateNaissance = $request->dateNaissance;
    //     $etatDeSante = $request->etatDeSante;
    //     $geniteur = $request->geniteur;
    //     $genitrice = $request->genitrice;

    //     $bovins = new Bovin();
    //     $bovins->codeBovin = $codeBovin; 
    //     $bovins->nom = $nom;
    //     $bovins->etat = $etat; 
    //     $bovins->photo = $photoName; 
    //     $bovins->dateNaissance = $dateNaissance; 
    //     $bovins->etatDeSante = $etatDeSante; 
    //     $bovins->geniteur = $geniteur; 
    //     $bovins->genitrice = $genitrice;
    //     $bovins->save();
    //     return redirect()->route('bovins.index')->with('bovin_ajoute', 'Ajout effectué avec success');
    // }
    // public function ajout(){
    //     return view('bovins.ajout-bovin');
    // }

    public function ensembles_bovins(){
        // $bovins = Bovin::latest()->paginate(3);
        $bovins = DB::table('bovins')
        ->join('races', 'races.idRace', '=', 'bovins.race_id')
        // ->join('genisses', 'genisses.idBovin','<>','bovins.idBovin')
        // ->join('vaches', 'vaches.codeBovin','<>','genisses.codeBovin')
        // ->join('taureaus', 'taureaus.codeBovin','<>','vaches.codeBovin')
        // ->join('veaus', 'veaus.codeBovin','<>','taureaus.codeBovin')
        // ->join('velles', 'velles.codeBovin','<>','veaus.codeBovin')
        ->select('*')
        // ->get();
        ->paginate(3);
        // dd($bovins);

        return view('bovins.tous_les_bovins',compact('bovins'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function modifierBovin($idBovin){
        $bovins = Bovin::find($idBovin);
        return view('bovins.modifier_bovin',compact('bovins'));
    }

    public function mise_a_jour(Request $request){
        $request->validate([
            // 'codeBovin'=>'required',
            'nom'=>'required',
            'etat'=>'required',
            'photo'=>'required|image',
            'dateNaissance'=>'required',
            'etatDeSante'=>'required',
            'geniteur'=>'required',
            'genitrice'=>'required'
        ]);

        // $codeBovin = $request->codeBovin;
        $nom = $request->nom;
        $etat = $request->etat;
        $photo = $request->file('photo');
        $photoName = time().'.'.$photo->extension();
        $photo->move(public_path('images'),$photoName);
        $dateNaissance = $request->dateNaissance;
        $etatDeSante = $request->etatDeSante;
        $geniteur = $request->geniteur;
        $genitrice = $request->genitrice;

        $bovins = Bovin::find($request->idBovin);
        // $bovins->codeBovin = $codeBovin; 
        $bovins->nom = $nom;
        $bovins->etat = $etat; 
        $bovins->photo = $photoName; 
        $bovins->dateNaissance = $dateNaissance; 
        $bovins->etatDeSante = $etatDeSante; 
        $bovins->geniteur = $geniteur; 
        $bovins->genitrice = $genitrice;
        $bovins->save();
        return redirect()->route('bovins.index')->with('bovin_a_jour', 'La mise a jour a réussi !');

    }

    public function supprimer_bovins($idBovin){
        $bovins = Bovin::find($idBovin);
        unlink(public_path('images').'/'.$bovins->photo);
        $bovins->delete();
        return back()->with('bovin_supprimer', 'Suppression effectuée avec success !');

    }
}
