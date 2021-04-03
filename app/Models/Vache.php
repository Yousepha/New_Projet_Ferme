<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vache extends Model
{
    use HasFactory;
    protected $primaryKey = 'idBovin';

    protected $fillable = [
        'idBovin',
        'codeBovin',
        'periode_id'
    ];

    public function periode(){
        return $this->belongsTo('App\Models\Periode');
    }
    public function productionLaits(){
        return $this->hasMany('App\Models\ProductionLait');
    }
    public $incrementing = false;
}
