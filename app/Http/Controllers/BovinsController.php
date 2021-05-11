<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BovinsController extends Controller
{
    public function index()
    {        
        $data = DB::table('bovins')
        ->join('races', 'races.idRace', '=', 'bovins.race_id')
        ->where('bovins.etat', '=', 'Vivant')
        ->where('bovins.situation', '<>', 'vendu')
        ->select('*')
        ->paginate(5);
        return view('bovins.index', compact('data'));
    }
}
