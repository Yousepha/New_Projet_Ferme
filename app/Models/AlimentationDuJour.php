<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlimentationDuJour extends Model
{   
    use HasFactory;
    protected $primaryKey ='idAlimentation';
    protected $fillable = [
        'fermier_id',
        'nomAlimentation',
        'quantite',
        'date'
    ];
     
    public function fermier(){
        return $this->belongsTo('App\Models\Fermier');
    }
}
