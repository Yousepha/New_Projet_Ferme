<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnostic extends Model
{   
    use HasFactory;
    
    protected $primaryKey ='idDiagnostic';

    protected $fillable = [        
        'bovin_id',
        'maladie_id',
        'dateMaladie',
        'dateGuerison'
    ];

    public function maladie(){
        return $this->belongsTo('App\Models\Maladie');
    }
    public function bovin(){
        return $this->belongsTo('App\Models\Bovin');
    }
}
