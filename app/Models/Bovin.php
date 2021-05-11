<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bovin extends Model
{
    use HasFactory;

    // protected $table = "bovins"
    protected $primaryKey = 'idBovin';

    protected $fillable = [
        'codeBovin',
        'nom',
        'etat',
        'photo',
        'dateNaissance',
        'etatDeSante',
        'geniteur',
        'genitrice',
        'situation',
        'prix',
        'description',
        'race_id'
    ];

    public function race(){
        return $this->belongsTo('App\Models\Race');
    }

    public function pesages(){
        return $this->hasMany('App\Models\Pesage');
    }

    public function achatBovins(){
        return $this->hasMany('App\Models\AchatBovin');
    }

    public function venteBovins(){
        return $this->hasMany('App\Models\VenteBovin');
    }

    public function diagnostics(){
        return $this->hasMany('App\Models\Diagnostic');
    }
    // public function genisses(){
    //     return $this->hasMany('App\Models\Genisse');
    // }
    
}
