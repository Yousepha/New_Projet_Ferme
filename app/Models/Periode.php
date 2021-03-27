<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $primaryKey ='idPeriode';

    protected $fillable = [
        'nomPeriode',
        'phase'
    ];
    public function vaches(){
        return $this->hasMany('App\Models\Vache');
    }
}
