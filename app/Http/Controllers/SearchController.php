<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Periode;

class SearchController extends Controller
{
    //

    function find(Request $request){        
        $request->validate([
            'search_text'=>'required|min:2'
        ]);

        $search_text = $request->input('search_text');
        $query_select = $request->input('query_select');
        
        $data = DB::table('bovins')
        ->join('races', 'races.idRace', '=', 'bovins.race_id')    
        ->where($query_select, 'LIKE', '%'. $search_text. '%')
        ->paginate(5);

        return view('bovins.index',['data'=>$data]);

    }

    function find_achat(Request $request){
        $request->validate([
            'search_text'=>'required|min:2'
        ]);

        $id_admin = auth()->user()->id;

        $search_text = $request->input('search_text');
        $query_select = $request->input('query_select');
        
        $data = DB::table('achat_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'achat_bovins.bovin_id')
        ->join('admins', 'admins.user_id', '=', 'achat_bovins.admin_id')
        ->join('races', 'races.idRace', '=', 'bovins.race_id')
        ->where('admins.user_id', $id_admin)    
        ->where($query_select, 'LIKE', '%'. $search_text. '%')
        ->paginate(5);

        return view('achatbovins.index',['data'=>$data]);

    }

    function search1(Request $req){

        $search_text = $_GET['query'];
        $query_select = $_GET['query_select'];
        $data = DB::table('bovins')
                ->join('races', 'races.idRace', '=', 'bovins.race_id')
                ->join('vaches', 'vaches.idBovin', '=', 'bovins.idBovin')    
                ->join('periodes', 'periodes.idPeriode', '=', 'vaches.periode_id')    
                ->where($query_select, 'LIKE', '%'. $search_text. '%')->paginate(5);
        // dd($data);
        return view('vaches.index', ['data' => $data]);
    }
}
