<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    protected $user, $client;
    public function __construct(){
        $this->user = new User;
        $this->client = new Client;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('users')
        ->join('clients', 'clients.user_id', '=', 'users.id')
        ->select('*')
        ->paginate(3);
        return view('clients.index', compact('data'));
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'    =>  'required|string',
            'prenom'     =>  'required|string',
            'telephone'     =>  'required|string|min:7|max:7',
            'adresse'     =>  'required',
            'login'     =>  'required',
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
            'telephone'        =>      $request->num . $request->telephone,
            'adresse'        =>       $request->adresse,
            'login'        =>       $request->login,
            'password'        =>       bcrypt($request->password),
            'profile'        =>       "client",
            'email'        =>       $request->email,
            'photo'            =>   $new_name
        );        

        DB::beginTransaction();
        try {
            $user = User::create($input_data);
            $client = $this->client->create([
                'user_id' => $user->id,
            ]);
            if($user && $client){
                DB::commit();
            }else{
                DB::rollback();
            }
        } catch (Exception $ex) {
            DB::rollback();
        }

        return redirect('clients')->with('Success', 'clients Inseré avec Succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $arr['client'] = DB::select("SELECT * from clients where clients.user_id = $id");
        //
        $arr['data'] = User::findOrFail($id);
        return view('clients.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $arr['client'] = DB::select("SELECT * from clients where clients.user_id = $id");
        //
        $arr['data'] = User::findOrFail($id);
        return view('clients.edit')->with($arr);
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
        $image_name = $request->hidden_image;
        $photo = $request->file('photo');
        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            // unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required|string',
                'prenom'     =>  'required|string',
                'telephone'     =>  'required|string|min:7|max:7',
                'adresse'     =>  'required',
                'login'     =>  'required',
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
                'telephone'     =>  'required|string|min:7|max:7',
                'adresse'     =>  'required',
                'login'     =>  'required',
                'password'     =>  'required|string|min:8',
                'profile'     =>  'nullable',
                'email'     =>  'nullable',
            ]);
        }

        
        $password = DB::select("SELECT * from users where id = $id");

        if($password[0]->password === $request->password){
            $input_data = array(
                'nom'       =>   $request->nom,
                'prenom'        =>   $request->prenom,
                'telephone'        =>      $request->num . $request->telephone,
                'adresse'        =>       $request->adresse,
                'login'        =>       $request->login,
                'password'        =>      $request->password,
                'email'        =>       $request->email,
                'photo'            =>   $image_name
            );
        }else{
            $input_data = array(
                'nom'       =>   $request->nom,
                'prenom'        =>   $request->prenom,
                'telephone'        =>      $request->num . $request->telephone,
                'adresse'        =>       $request->adresse,
                'login'        =>       $request->login,
                'password'        =>      bcrypt($request->password),
                'email'        =>       $request->email,
                'photo'            =>   $image_name
            );
        }
        
        User::whereid($id)->update($input_data);

        return redirect('clients')->with('Success', 'Client modifié avec Succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        unlink(public_path('images').'/'.$data->photo);
        
        DB::table("clients")->where("user_id", $id)->delete();
        
        $data->delete();

        return redirect('clients')->with('error', 'Client supprimé avec Succès');
    }
}
