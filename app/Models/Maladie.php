<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maladie extends Model
{
    use HasFactory;
    
    protected $primaryKey ='idMaladie';
    
    protected $fillable = [
        'nomMaladie'        
    ];

    public function diagnostics(){
        return $this->hasMany('App\Models\Diagnostic');
    }
}
