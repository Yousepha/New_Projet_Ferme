<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenteBovin extends Model
{
    use HasFactory;
    protected $primaryKey = 'idVenteBovin';

    protected $fillable = [
        'prixBovin',
        'dateVenteBovin',
        'bovin_id',
        'description',
        'commande_id',
    ];
    
    public function bovin(){
        return $this->belongsTo('App\Models\Bovin');
    }
    
    public function commande(){
        return $this->belongsTo('App\Models\Commande');
    }
    
}
