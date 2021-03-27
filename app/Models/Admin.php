<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
    ];
    
    public function bovin(){
        return $this->hasMany('App\Models\Bovin');
    }
    public function autreDepenses(){
        return $this->hasMany('App\Models\autreDepense');
    }
    public function achatsAliments(){
        return $this->hasMany('App\Models\AchatAliment');
    }
    public $incrementing = false;
    protected $primaryKey = 'user_id';
}
