<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutresDepenses extends Model
{
    use HasFactory;
    protected $primaryKey ='idDepenses';
    protected $fillable = [
        'admin_id',
        'dateDepenses',
        'type',
        "libelle",
        'montant'
    ];    
    
    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }

    public function types(){
        return $this->hasMany('App\Models\Type');
    }
}
