<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fermier extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'salaire'
    ];
    
    public function traiteDuJours(){
        return $this->hasMany('App\Models\TraiteDuJour');
    }
    public function alimentDuJours(){
        return $this->hasMany('App\Models\AlimentationDuJour');
    }
    public $incrementing = false;
    protected $primaryKey = 'user_id';
}
