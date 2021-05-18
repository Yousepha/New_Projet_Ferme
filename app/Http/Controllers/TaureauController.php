<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Taureau;
use App\Models\Race;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class TaureauController extends Controller
{
    protected $bovin, $taureau;
    public function __construct(){
        $this->bovin = new Bovin;
        $this->taureau = new Taureau;
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
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->where('bovins.etat', '=', 'Vivant')
        ->select('*')
        ->paginate(3);
        return view('taureaux.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $races = Race::all();
        
        return view('taureaux.create', compact('races'));
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

        $request->validate([
            'nom'    =>  'required',
            'etat'     =>  'required',
            // 'prix'     =>  'nullable',
            // 'situation'     =>  'nullable',
            'dateNaissance'     =>  'nullable|date|before:'.$date_actu.'',
            'etatDeSante'     =>  'required',
            // 'geniteur'     =>  'nullable|string',
            // 'genitrice'     =>  'nullable|string',
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
            // 'geniteur'        =>       $request->geniteur,
            // 'genitrice'        =>       $request->genitrice,
            'race_id'        =>       $request->race_id,
            // 'prix'        =>       $request->prix,
            // 'situation'        =>       $request->situation,
            'photo'            =>   $new_name,
        );
        

        DB::beginTransaction();
        try {
            $bovin = Bovin::create($input_data);
            $taureau = $this->taureau->create([
                'idBovin' => $bovin->idBovin,
                'codeBovin' => $q->codeBovin,
            ]);
            if($bovin && $taureau){
                DB::commit();
            }else{
                DB::rollback();
            }
        } catch (Exception $ex) {
            DB::rollback();
        }
        
        
        return redirect('taureaux')->with('Success', 'Taureau Inseré avec Succès');
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
        
        $arr['races'] = DB::select("SELECT * from races , bovins where bovins.race_id = races.idRace and bovins.idBovin = $idBovin limit 1");
        // dd($arr);
        return view('taureaux.show')->with($arr);
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
        $arr['data'] = Bovin::findOrFail($idBovin);

        return view('taureaux.edit')->with($arr);
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
            // unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required',
                'etat'     =>  'required',
                'dateNaissance'     =>  'nullable|date|before:'.$date_actu.'',
                'etatDeSante'     =>  'required',
                // 'prix'     =>  'nullable',
                // 'situation'     =>  'nullable',
                // 'geniteur'     =>  'nullable|string',
                // 'genitrice'     =>  'nullable|string',
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
                // 'prix'     =>  'nullable',
                // 'situation'     =>  'nullable',
                // 'geniteur'     =>  'nullable|string',
                // 'genitrice'     =>  'nullable|string',
            ]);
        }

        $input_data = array(
            'nom'       =>   $request->nom,
            'etat'        =>   $request->etat,
            'dateNaissance'        =>      $request->dateNaissance,
            'etatDeSante'        =>       $request->etatDeSante,
            // 'geniteur'        =>       $request->geniteur,
            // 'genitrice'        =>       $request->genitrice,
            'race_id'        =>       $request->race_id,
            // 'prix'        =>       $request->prix,
            // 'situation'        =>       $request->situation,
            'photo'            =>   $image_name
        );

        Bovin::whereIdbovin($idBovin)->update($input_data);
        
        
        return redirect('taureaux')->with('Success', 'Taureau modifié avec Succès');
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

        DB::table("taureaus")->where("idBovin", $idBovin)->delete();

        return redirect('taureaux')->with('error', 'Taureau supprimé avec Succès');
    }

    public function nombreTaureau(){
        $taureau = DB::table('bovins')
        // ->first()
        // ->join('bovins','bovins.idBovin', '=', 'taureaus.idBovin')
        // ->where("bovins.etat","Vivant")
        ->count();


        // return Taureau::where("etat","Vivant")->count();
        return $taureau;
    }

    public function search(Request $request){
        $request->validate([
            'search_text'=>'required|min:2'
        ]);        

        $search_text = $request->input('search_text');
        $query_select = $request->input('query_select');

        $data = DB::table('bovins')
        ->join('races', 'races.idRace', '=', 'bovins.race_id')
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->where($query_select, 'LIKE', '%'. $search_text. '%')
        ->paginate(3);
        
        return view('taureaux.index', compact('data'));
    }
}