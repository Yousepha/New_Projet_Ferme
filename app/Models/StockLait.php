<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLait extends Model
{   
    use HasFactory;
    protected $primaryKey ='idStock';

    protected $fillable = [
        'quantiteTotale',
        'quantiteVendue',
        'quantiteDispo'
    ];
    
    public function bouteilles(){
        return $this->hasMany('App\Models\Bouteille');
    }
}
