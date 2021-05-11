<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $primaryKey ='idType';
    
    protected $fillable = [
        'nomType',
    ];

    public function autresdepense(){
        return $this->belongsTo('App\Models\AutresDepenses');
    }
}
