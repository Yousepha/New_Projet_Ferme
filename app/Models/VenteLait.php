<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VenteLait extends Model
{
    use HasFactory;
    protected $primaryKey = 'idVenteLait';

    protected $fillable = [
        'prixTotale',
        'commande_id',
        'bouteille_id',
        'enLigne',
        'nbrBouteilleVendu'
    ];
    
    
    public function commande(){
        return $this->belongsTo('App\Models\Commande');
    }
    
    public function bouteille(){
        return $this->belongsTo('App\Models\Bouteille');
    }
}
