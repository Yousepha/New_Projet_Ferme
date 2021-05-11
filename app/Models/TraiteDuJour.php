<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TraiteDuJour extends Model
{
    use HasFactory;
    protected $primaryKey ='idTraiteDuJour';

    protected $fillable = [
        'traiteMatin',
        'traiteSoir',
        'dateTraite',
        'productionLait_id',
        'fermier_id'
    ];
    
    public function fermier(){
        return $this->belongsTo('App\Models\Fermier');
    }
    public function productionLait(){
        return $this->belongsTo('App\Models\ProductionLait');
    }
}
