<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Taureau;
use App\Models\Race;
use App\Models\AchatBovin;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class AchatTaureauController extends Controller
{
    protected $bovin, $taureau, $achat_bovin;
    public function __construct(){
        $this->bovin = new Bovin;
        $this->taureau = new Taureau;
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
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->paginate(3);
        return view('achattaureaux.index', compact('data'));

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
        
        return view('achattaureaux.create', compact('races','achat_bovin'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');
        
        $codeBovin = Helper::IDGenerator(new Taureau,'idBovin', 'codeBovin', 2, 'TAU');
        $q = new Taureau;
        $q->codeBovin = $codeBovin;

        $admin_id = auth()->user()->id;

        $request->validate([
            'nom'    =>  'required',
            'etat'     =>  'required',
            'dateNaissance'     =>  'nullable|date|before:'.$date_actu.'',
            'etatDeSante'     =>  'required',
            'montantBovin'     =>  'required',
            'dateAchatBovin'     =>  'required|date|before:'.$date_actu.'',
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
            'prix'        =>       $request->montantBovin,
            'geniteur'        =>       $request->geniteur,
            'genitrice'        =>       $request->genitrice,
            'race_id'        =>       $request->race_id,
            'photo'            =>   $new_name,
        );
        

        DB::beginTransaction();
        try {
            $bovin = Bovin::create($input_data);
            $taureau = $this->taureau->create([
                'idBovin' => $bovin->idBovin,
                'codeBovin' => $q->codeBovin,
            ]);
            $achat_bovin = $this->achat_bovin->create([
                'admin_id' => $admin_id,
                'bovin_id' => $bovin->idBovin,
                'montantBovin' => $request->montantBovin,
                'dateAchatBovin' => $request->dateAchatBovin,
        
            ]);
            if($bovin && $taureau && $achat_bovin){
                DB::commit();
            }else{
                DB::rollback();
            }
        } catch (Exception $ex) {
            DB::rollback();
        }
        
        
        return redirect('achattaureaux')->with('Success', 'L\'achat du Taureau Inseré avec Succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idBovin)
    {
        $arr['taur'] = DB::select("SELECT * from taureaus where taureaus.idBovin = $idBovin limit 1");

        $arr['data'] = Bovin::findOrFail($idBovin);
        
        $arr['achat_taureau'] = DB::select("SELECT * from achat_bovins, bovins where achat_bovins.bovin_id = bovins.idBovin and bovins.idBovin = $idBovin");
        
        $arr['races'] = DB::select("SELECT * from races , bovins where bovins.race_id = races.idRace and bovins.idBovin = $idBovin limit 1");
        // dd($arr);
        return view('achattaureaux.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idBovin)
    {
        $arr['taur'] = DB::select("SELECT * from taureaus where taureaus.idBovin = $idBovin limit 1");
        $arr['races'] = DB::select("SELECT * from races ");
        $arr['achat_taureau'] = DB::select("SELECT * from achat_bovins, bovins where achat_bovins.bovin_id = bovins.idBovin and bovins.idBovin = $idBovin");
        // dd($arr['achat_taureau']);
        $arr['data'] = Bovin::findOrFail($idBovin);

        return view('achattaureaux.edit')->with($arr);
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
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');
        
        $image_name = $request->hidden_image;
        $photo = $request->file('photo');
        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required',
                'etat'     =>  'required',
                'dateNaissance'     =>  'nullable|date|before:'.$date_actu.'',
                'etatDeSante'     =>  'required',
                'geniteur'     =>  'nullable',
                'genitrice'     =>  'nullable',
                'montantBovin'     =>  'required',
                'dateAchatBovin'     =>  'required|date|before:'.$date_actu.'',
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
                'dateNaissance'     =>  'nullable|date|before:'.$date_actu.'',
                'etatDeSante'     =>  'required',
                'geniteur'     =>  'nullable',
                'genitrice'     =>  'nullable',
                'montantBovin'     =>  'required',
                'dateAchatBovin'     =>  'required|date|before:'.$date_actu.'',
            ]);
        }

        $input_data = array(
            'nom'       =>   $request->nom,
            'etat'        =>   $request->etat,
            'dateNaissance'        =>      $request->dateNaissance,
            'etatDeSante'        =>       $request->etatDeSante,
            'prix'        =>       $request->montantBovin,
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

        
        return redirect('achattaureaux')->with('Success', 'L\'achat du Taureau modifié avec Succès');
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

        DB::table("taureaus")->where("idBovin", $idBovin)->delete();
        
        $achat_bovin->delete();

        return redirect('achattaureaux')->with('error', 'L\'achat du Taureau supprimé avec Succès');
    }
}
