<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Vache;
use App\Models\Race;
use App\Models\Periode;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class VachesController extends Controller
{
    protected $bovin, $vache, $periode;
    public function __construct(){
        $this->bovin = new Bovin;
        $this->vache = new Vache;
        $this->periode = new Periode;
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
        ->join('vaches', 'vaches.idBovin','=','bovins.idBovin')
        ->join('periodes', 'periodes.idPeriode','=','vaches.periode_id')
        ->select('*')
        ->paginate(3);
        return view('vaches.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $races = Race::all();
        $periodes = Periode::all();
        return view('vaches.create', compact('races','periodes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codeBovin = Helper::IDGenerator(new Vache,'idBovin', 'codeBovin', 6, 'VAC');
        $q = new Vache;
        $q->codeBovin = $codeBovin;

        // $errorMessage = [
        //     'required' => 'Le champ :attribute est obligatoire'
        // ];

        $request->validate([
            'nom'    =>  'required',
            'etat'     =>  'required',
            'dateNaissance'     =>  'required|date',
            'etatDeSante'     =>  'required',
            'geniteur'     =>  'required',
            'genitrice'     =>  'required',
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
            'photo'            =>   $new_name,
        );
        

        DB::beginTransaction();
        try {
            $bovin = Bovin::create($input_data);
            $periode = $this->periode->create([
                'nomPeriode' => $request->nomPeriode,
                'phase' => $request->phase,
            ]);
                
            $vache = $this->vache->create([
                'idBovin' => $bovin->idBovin,
                'periode_id' => $periode->idPeriode,
                'codeBovin' => $q->codeBovin,
            ]);

            if($bovin && $vache && $periode){
                DB::commit();
            }else{
                DB::rollback();
            }
        } catch (Exception $ex) {
            DB::rollback();
        }
        
        
        return redirect('vaches')->with('Success', 'Vache Inseré avec Succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idBovin)
    {
        $arr['vachs'] = DB::select("SELECT * from vaches where vaches.idBovin = $idBovin limit 1");

        $arr['data'] = Bovin::findOrFail($idBovin);
        
        $arr['races'] = DB::select("SELECT * from races , bovins where bovins.race_id = races.idRace and bovins.idBovin = $idBovin limit 1");
        
        $arr['periodes'] = DB::select("SELECT * from periodes , vaches where vaches.periode_id = periodes.idPeriode and vaches.idBovin = $idBovin limit 1");
        // dd($arr);
        return view('vaches.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idBovin)
    {
        $arr['vachs'] = DB::select("SELECT * from vaches where vaches.idBovin = $idBovin limit 1");
        $arr['races'] = DB::select("SELECT * from races ");
        $arr['periodes'] = DB::select("SELECT * from periodes, vaches where periodes.idPeriode = vaches.periode_id and vaches.idBovin = $idBovin");
        $arr['data'] = Bovin::findOrFail($idBovin);
        // dd($arr['periodes']);

        return view('vaches.edit')->with($arr);
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
            // unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required',
                'etat'     =>  'required',
                'dateNaissance'     =>  'required|date',
                'etatDeSante'     =>  'required',
                'geniteur'     =>  'required',
                'genitrice'     =>  'required',
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
                'geniteur'     =>  'required',
                'genitrice'     =>  'required',
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
            'photo'            =>   $image_name
        );

        Bovin::whereIdbovin($idBovin)->update($input_data);
        
        $periode = array(
            'nomPeriode' => $request->nomPeriode,
            'phase' => $request->phase,
        );

        $arr = DB::select("SELECT idPeriode from periodes, vaches where periodes.idPeriode = vaches.periode_id and vaches.idBovin = $idBovin");

        // dd($arr[0]->idPeriode);
        $vache = array(
            'periode_id'  =>  $arr[0]->idPeriode,
        );
        Vache::whereIdbovin($idBovin)->update($vache);

        Periode::whereIdperiode($arr[0]->idPeriode)->update($periode);


        return redirect('vaches')->with('Success', 'Vache modifié avec Succès');
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

        $vache = DB::table("vaches")->where("idBovin", $idBovin);
        
        $arr = DB::select("SELECT idPeriode from periodes, vaches where periodes.idPeriode = vaches.periode_id and vaches.idBovin = $idBovin");
        
        DB::table("periodes")->where("idPeriode", $arr[0]->idPeriode)->delete();
        
        $vache->delete();

        return redirect('vaches')->with('error', 'Vache supprimé avec Succès');
    }

}
