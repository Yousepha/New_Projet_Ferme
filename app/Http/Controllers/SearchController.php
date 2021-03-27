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
            'query'=>'required|min:1'
       ]);

        $search_text = $request->input('query');
        $data = DB::table('bovins')
                    ->join('races', 'races.idRace', '=', 'bovins.race_id')
                    ->where('etat','LIKE','%'.$search_text.'%')
                    ->orWhere('nom','LIKE','%'.$search_text.'%')
                    ->orWhere('codeBovin','LIKE','%'.$search_text.'%')
                    ->orWhere('etatDeSante','like','%'.$search_text.'%')
                    ->paginate(5);
        return view('bovins.index',['data'=>$data]);

    }

    function find_achat(Request $request){
        $request->validate([
            'query'=>'required|min:1'
       ]);

        $search_text = $request->input('query');
        $data = DB::table('achat_bovins')
                    ->join('bovins', 'bovins.idBovin', '=', 'achat_bovins.bovin_id')
                    ->join('admins', 'admins.user_id', '=', 'achat_bovins.admin_id')
                    ->join('races', 'races.idRace', '=', 'bovins.race_id')
                    ->where('montantBovin','LIKE','%'.$search_text.'%')
                    ->orWhere('dateAchatBovin','LIKE','%'.$search_text.'%')
                    ->orWhere('nom','LIKE','%'.$search_text.'%')
                    ->orWhere('codeBovin','LIKE','%'.$search_text.'%')
                    ->orWhere('etatDeSante','like','%'.$search_text.'%')
                    ->paginate(5);
        return view('achatbovins.index',['data'=>$data]);

    }

    function search1(Request $req){

        $search_text = $_GET['query'];
        $query_select = $_GET['query_select'];
        $data = Periode::where($query_select, 'LIKE', '%'. $search_text. '%')->paginate(5);
        return view('vaches.index', ['data' => $data, 'query_select' => $query_select]);
    }
}
