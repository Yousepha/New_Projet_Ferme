<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Fermier;
use Illuminate\Support\Facades\DB;

class ProfilController extends Controller
{
    // Profil Admin
    public function profileAdmin(){
        $id_user = auth()->user()->id;
       
        $data = DB::table('users')
        ->join('admins', 'admins.user_id', '=', 'users.id')
        ->where('admins.user_id',$id_user)
        ->select('*')
        ->get();

        return view('ProfileUpdate.admin', compact('data'));
    }

    public function updateProfileAdmin(Request $request, $id){
        //
        // dd('ssalut');
        $image_name = $request->hidden_image;
        $photo = $request->file('photo');
        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            // unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required|string',
                'prenom'     =>  'required|string',
                'telephone'     =>  'required|string|min:7|max:7',
                'adresse'     =>  'required|string',
                'login'     =>  'required|string',
                'password'     =>  'required|string|min:8',
                'email'     =>  'nullable',
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
                'email'     =>  'nullable',
            ]);
        }

        $id_user = auth()->user()->id;
        
        $password = DB::select("SELECT * from users where id = $id_user");

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

        return back()->with('Success', 'Profile modifié avec Succès');
    }
    
    // Profil Fermier
    public function profileFermier(){
        $id_user = auth()->user()->id;
       
        $data = DB::table('users')
        ->join('fermiers', 'fermiers.user_id', '=', 'users.id')
        ->where('fermiers.user_id',$id_user)
        ->select('*')
        ->get();

        return view('ProfileUpdate.fermier', compact('data'));
    }

    public function updateProfileFermier(Request $request, $id){
        //
        $image_name = $request->hidden_image;
        $photo = $request->file('photo');
        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            // unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required|string',
                'prenom'     =>  'required|string',
                'telephone'     =>  'required|string|min:7|max:7',
                'adresse'     =>  'required|string',
                'login'     =>  'required|string',
                'password'     =>  'required|string|min:8',
                'email'     =>  'nullable',
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
                'email'     =>  'nullable',
            ]);
        }

        $id_user = auth()->user()->id;

        $password = DB::select("SELECT * from users where id = $id_user");

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

        return back()->with('Success', 'Profile modifié avec Succès');
    }
    
    // Profil User
    public function profileUser(){
        $id_user = auth()->user()->id;
       
        $data = DB::table('users')
        ->where('users.id',$id_user)
        ->select('*')
        ->get();

        return view('ProfileUpdate.client', compact('data'));
    }

    public function updateProfileUser(Request $request, $id){
        //
        $image_name = $request->hidden_image;
        $photo = $request->file('photo');
        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'nom'    =>  'required|string',
                'prenom'     =>  'required|string',
                'telephone'     =>  'required|string|min:7|max:7',
                'adresse'     =>  'required|string',
                'login'     =>  'required|string',
                'password'     =>  'required|string|min:8',
                'email'     =>  'nullable',
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
                'email'     =>  'nullable',
            ]);
        }

        $id_user = auth()->user()->id;
        
        $password = DB::select("SELECT * from users where id = $id_user");

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

        return back()->with('Success', 'Profile modifié avec Succès');
    }
}
