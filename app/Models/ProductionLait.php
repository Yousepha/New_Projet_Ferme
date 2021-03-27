<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductionLait extends Model
{
    use HasFactory;
    protected $primaryKey ='idProductionLait';

    protected $fillable = [
        'idProductionLait',
        'bovin_id'
    ];
    public function vache(){
        return $this->belongsTo('App\Models\Vache');
    }
    public function traiteDuJours(){
        return $this->hasMany('App\Models\TraiteDuJour');
    }

}
