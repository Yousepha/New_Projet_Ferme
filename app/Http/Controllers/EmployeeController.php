<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fermier;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    protected $user, $fermier;
    public function __construct(){
        $this->user = new User;
        $this->fermier = new Fermier;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
        ->join('fermiers', 'fermiers.user_id', '=', 'users.id')
        ->where('users.est_fermier', '=', 1)
        ->select('*')
        ->paginate(3);
        return view('employee.index', compact('data'));
 
        
        // $data = User::latest()->paginate(3);
        // return view('employee.index', compact('data'))
        //         ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Fermier::all();
        //
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nom'    =>  'required|string',
            'prenom'     =>  'required|string',
            'telephone'     =>  'required|string|min:9|max:9',
            'adresse'     =>  'required|string',
            'login'     =>  'required|string',
            'password'     =>  'required|string|min:8',
            'profile'     =>  'nullable',
            'email'     =>  'nullable',
            'photo'         =>  'image|max:2048',
        ]);

        $photo = $request->file('photo');

        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $new_name);
        $input_data = array(
            'nom'       =>   $request->nom,
            'prenom'        =>   $request->prenom,
            'telephone'        =>      $request->telephone,
            'adresse'        =>       $request->adresse,
            'login'        =>       $request->login,
            'password'        =>       $request->password,
            'profile'        =>       $request->profile,
            'email'        =>       $request->email,
            'est_fermier' => 1,
            'photo'            =>   $new_name
        );        

        DB::beginTransaction();
        try {
            $user = User::create($input_data);
            $fermier = $this->fermier->create([
                'user_id' => $user->id,
                'salaire' => $request->salaire,
            ]);
            if($user && $fermier){
                DB::commit();
            }else{
                DB::rollback();
            }
        } catch (Exception $ex) {
            DB::rollback();
        }

        return redirect('employee')->with('Success', 'Employee Inseré avec Succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arr['fermier'] = DB::select("SELECT * from fermiers where fermiers.user_id = $id");
        //
        $arr['data'] = User::findOrFail($id);
        return view('employee.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr['fermier'] = DB::select("SELECT * from fermiers where fermiers.user_id = $id");
        //
        $arr['data'] = User::findOrFail($id);
        return view('employee.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $image_name = $request->hidden_image;
        $photo = $request->file('photo');
        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            // unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required|string',
                'prenom'     =>  'required|string',
                'telephone'     =>  'required|string|min:9|max:9',
                'adresse'     =>  'required|string',
                'login'     =>  'required|string',
                'password'     =>  'required|string|min:8',
                'email'     =>  'nullable',
                'profile'     =>  'nullable',
                'photo'         =>  'image|max:2048'
            ]);

            $image_name = rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $image_name);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            $request->validate([
                'nom'    =>  'required|string',
                'prenom'     =>  'required|string',
                'telephone'     =>  'required|string|min:9|max:9',
                'adresse'     =>  'required',
                'login'     =>  'required',
                'password'     =>  'required|string|min:8',
                'profile'     =>  'nullable',
                'email'     =>  'nullable',
            ]);
        }

        $input_data = array(
            'nom'       =>   $request->nom,
            'prenom'        =>   $request->prenom,
            'telephone'        =>      $request->telephone,
            'adresse'        =>       $request->adresse,
            'login'        =>       $request->login,
            'password'        =>      $request->password,
            'profile'        =>       $request->profile,
            'email'        =>       $request->email,
            // 'est_fermier' => 1,
            'photo'            =>   $image_name
        );
        
        User::whereid($id)->update($input_data);

        $fermier = array(
            'salaire' => $request->salaire,
        );

        Fermier::whereuser_id($id)->update($fermier);


        return redirect('employee')->with('Success', 'Employé modifié avec Succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = User::findOrFail($id);
        unlink(public_path('images').'/'.$data->photo);
        $data->delete();

        DB::table("fermiers")->where("user_id", $id)->delete();

        return redirect('employee')->with('error', 'Employé supprimé avec Succès');
    }
}
