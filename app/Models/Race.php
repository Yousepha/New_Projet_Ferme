<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Race extends Model
{
    use HasFactory;
    protected $primaryKey ='idRace';

    protected $fillable = [
        'nomRace'
    ];
    
    public function bovins(){
        return $this->hasMany('App\Models\Bovin');
    }
}
