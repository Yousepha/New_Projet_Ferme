<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Velle;
use App\Models\Race;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class VelleController extends Controller
{
    protected $bovin, $velle;
    public function __construct(){
        $this->bovin = new Bovin;
        $this->velle = new Velle;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data = DB::table('bovins')
        ->join('races', 'races.idRace', '=', 'bovins.race_id')
        ->join('velles', 'velles.idBovin','=','bovins.idBovin')
        ->select('*')
        ->paginate(3);
        return view('velles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $races = Race::all();

        $geniteurs = DB::table('taureaus')
        ->join('bovins', 'bovins.idBovin', '=', 'taureaus.idBovin')
        ->select('*')
        ->get();

        $genitrices = DB::table('vaches')
        ->join('bovins', 'bovins.idBovin', '=', 'vaches.idBovin')
        ->join('periodes', 'periodes.idPeriode','=','vaches.periode_id')
        ->where('periodes.phase', 'gestant')
        ->get();

        return view('velles.create', compact('races', 'geniteurs', 'genitrices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codeBovin = Helper::IDGenerator(new Velle,'idBovin', 'codeBovin', 2, 'VEL');
        $q = new Velle;
        $q->codeBovin = $codeBovin;

        // $errorMessage = [
        //     'required' => 'Le champ :attribute est obligatoire'
        // ];

        $request->validate([
            'nom'    =>  'required',
            'etat'     =>  'required',
            'dateNaissance'     =>  'required|date',
            'etatDeSante'     =>  'required',
            'prix'     =>  'nullable',
            'situation'     =>  'nullable',
            'geniteur'     =>  'nullable|string',
            'genitrice'     =>  'nullable|string',
            'photo'         =>  'required|image|max:2048'
        ]);

        
        $photo = $request->file('photo');
        
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $new_name);
        $input_data = array(
            'codeBovin' => $q->codeBovin,
            'nom'       =>   $request->nom,
            'etat'        =>   $request->etat,
            'dateNaissance'        =>      $request->dateNaissance,
            'etatDeSante'        =>       $request->etatDeSante,
            'geniteur'        =>       $request->geniteur,
            'genitrice'        =>       $request->genitrice,
            'race_id'        =>       $request->race_id,
            'prix'        =>       $request->prix,
            'situation'        =>       $request->situation,
            'photo'            =>   $new_name,
        );
        

        DB::beginTransaction();
        try {
            $bovin = Bovin::create($input_data);
            $velle = $this->velle->create([
                'idBovin' => $bovin->idBovin,
                'codeBovin' => $q->codeBovin,
            ]);
            if($bovin && $velle){
                DB::commit();
            }else{
                DB::rollback();
            }
        } catch (Exception $ex) {
            DB::rollback();
        }
        
        
        return redirect('velles')->with('Success', 'Velle Inseré avec Succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idBovin)
    {
        $arr['velle'] = DB::select("SELECT * from velles where velles.idBovin = $idBovin limit 1");

        $arr['data'] = Bovin::findOrFail($idBovin);
        
        $arr['races'] = DB::select("SELECT * from races , bovins where bovins.race_id = races.idRace and bovins.idBovin = $idBovin limit 1");
        // dd($arr);
        return view('velles.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idBovin)
    {
        $arr['velle'] = DB::select("SELECT * from velles where velles.idBovin = $idBovin limit 1");
        $arr['races'] = DB::select("SELECT * from races ");
        $arr['data'] = Bovin::findOrFail($idBovin);
        $arr['geniteurs'] = DB::table('taureaus')
        ->join('bovins', 'bovins.idBovin', '=', 'taureaus.idBovin')
        ->select('*')
        ->get();
        $arr['genitrices'] = DB::table('vaches')
        ->join('bovins', 'bovins.idBovin', '=', 'vaches.idBovin')
        ->join('periodes', 'periodes.idPeriode','=','vaches.periode_id')
        ->where('periodes.phase', 'gestant')
        ->get();

        return view('velles.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBovin)
    {
        $image_name = $request->hidden_image;
        $photo = $request->file('photo');
        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required',
                'etat'     =>  'required',
                'dateNaissance'     =>  'required|date',
                'etatDeSante'     =>  'required',
                'prix'     =>  'nullable',
                'situation'     =>  'nullable',
                'geniteur'     =>  'nullable|string',
                'genitrice'     =>  'nullable|string',
                'photo'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $image_name);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'nom'    =>  'required',
                'etat'     =>  'required',
                'dateNaissance'     =>  'required|date',
                'etatDeSante'     =>  'required',
                'prix'     =>  'nullable',
                'situation'     =>  'nullable',
                'geniteur'     =>  'nullable|string',
                'genitrice'     =>  'nullable|string',
            ]);
        }

        $input_data = array(
            'nom'       =>   $request->nom,
            'etat'        =>   $request->etat,
            'dateNaissance'        =>      $request->dateNaissance,
            'etatDeSante'        =>       $request->etatDeSante,
            'geniteur'        =>       $request->geniteur,
            'genitrice'        =>       $request->genitrice,
            'race_id'        =>       $request->race_id,
            'prix'        =>       $request->prix,
            'situation'        =>       $request->situation,
            'photo'            =>   $image_name
        );

        Bovin::whereIdbovin($idBovin)->update($input_data);
        
        
        return redirect('velles')->with('Success', 'Velle modifié avec Succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idBovin)
    {
        
        $data = Bovin::findOrFail($idBovin);
        unlink(public_path('images').'/'.$data->photo);
        
        $data->delete();

        DB::table("velles")->where("idBovin", $idBovin)->delete();

        return redirect('velles')->with('error', 'Velle supprimé avec Succès');
    }

}