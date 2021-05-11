<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Velle;
use App\Models\Race;
use App\Models\AchatBovin;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class AchatVelleController extends Controller
{
    protected $bovin, $velle, $achat_bovin;
    public function __construct(){
        $this->bovin = new Bovin;
        $this->velle = new Velle;
        $this->achat_bovin = new AchatBovin;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('achat_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'achat_bovins.bovin_id')
        ->join('admins', 'admins.user_id', '=', 'achat_bovins.admin_id')
        ->join('races', 'races.idRace', '=', 'bovins.race_id')
        ->join('velles', 'velles.idBovin','=','bovins.idBovin')
        ->select('*')
        ->paginate(3);
        return view('achatvelles.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $races = Race::all();
        $achat_bovin = AchatBovin::all();
        
        return view('achatvelles.create', compact('races','achat_bovin'));
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

        $admin_id = DB::select("SELECT id from users where est_admin = 1");
        
        // $errorMessage = [
        //     'required' => 'Le champ :attribute est obligatoire'
        // ];

        $request->validate([
            'nom'    =>  'required',
            'etat'     =>  'required',
            'dateNaissance'     =>  'nullable|date',
            'etatDeSante'     =>  'required',
            'dateAchatBovin'     =>  'required',
            'montantBovin'     =>  'required',
            'geniteur'     =>  'nullable',
            'genitrice'     =>  'nullable',
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
            $velle = $this->velle->create([
                'idBovin' => $bovin->idBovin,
                'codeBovin' => $q->codeBovin,
            ]);
            $achat_bovin = $this->achat_bovin->create([
                'admin_id' => $admin_id[0]->id,
                'bovin_id' => $bovin->idBovin,
                'montantBovin' => $request->montantBovin,
                'dateAchatBovin' => $request->dateAchatBovin,
        
            ]);
            if($bovin && $velle && $achat_bovin){
                DB::commit();
            }else{
                DB::rollback();
            }
        } catch (Exception $ex) {
            DB::rollback();
        }
        
        
        return redirect('achatvelles')->with('Success', 'L\'achat du Velle Inseré avec Succès');
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
        
        $arr['achat_velle'] = DB::select("SELECT * from achat_bovins, bovins where achat_bovins.bovin_id = bovins.idBovin and bovins.idBovin = $idBovin");
        
        $arr['races'] = DB::select("SELECT * from races , bovins where bovins.race_id = races.idRace and bovins.idBovin = $idBovin limit 1");
        // dd($arr);
        return view('achatvelles.show')->with($arr);
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
        $arr['achat_velle'] = DB::select("SELECT * from achat_bovins, bovins where achat_bovins.bovin_id = bovins.idBovin and bovins.idBovin = $idBovin");
        $arr['data'] = Bovin::findOrFail($idBovin);

        return view('achatvelles.edit')->with($arr);
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
                'dateNaissance'     =>  'nullable|date',
                'etatDeSante'     =>  'required',
                'dateAchatBovin'     =>  'required',
                'montantBovin'     =>  'required',
                'geniteur'     =>  'nullable',
                'genitrice'     =>  'nullable',
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
                'dateNaissance'     =>  'nullable|date',
                'etatDeSante'     =>  'required',
                'dateAchatBovin'     =>  'required',
                'montantBovin'     =>  'required',
                'geniteur'     =>  'nullable',
                'genitrice'     =>  'nullable',
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
        
        $input_achat = array(
            'montantBovin' => $request->montantBovin,
            'dateAchatBovin' => $request->dateAchatBovin,

        );

        $arr = DB::select("SELECT idAchat from achat_bovins, bovins where achat_bovins.bovin_id = bovins.idBovin and bovins.idBovin = $idBovin");
        
        AchatBovin::whereIdachat($arr[0]->idAchat)->update($input_achat);

        
        return redirect('achatvelles')->with('Success', 'L\'achat du Velle modifié avec Succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idBovin)
    {
        $arr = DB::select("SELECT idAchat from achat_bovins, bovins where achat_bovins.bovin_id = bovins.idBovin and bovins.idBovin = $idBovin");
        
        $achat_bovin = DB::table("achat_bovins")->where("idAchat", $arr[0]->idAchat);
        
        $data = Bovin::findOrFail($idBovin);
        unlink(public_path('images').'/'.$data->photo);
        
        $data->delete();

        DB::table("velles")->where("idBovin", $idBovin)->delete();
        
        $achat_bovin->delete();

        return redirect('achatvelles')->with('error', 'L\'achat du Velle supprimé avec Succès');
    }
}
