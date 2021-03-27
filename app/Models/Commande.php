<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $primaryKey ='idCom';

    protected $fillable = [
        'client_id',
        'dateCom'
    ];

    public function client(){
        return $this->belongsTo('App\Models\Client');
    }
    public function venteBovins(){
        return $this->hasMany('App\Models\VenteBovin');
    }
    public function venteLaits(){
        return $this->hasMany('App\Models\VenteLait');
    }
}
