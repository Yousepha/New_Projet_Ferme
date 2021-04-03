<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bouteille extends Model
{
    use HasFactory;
    protected $primaryKey ='idBouteille';

    protected $fillable = [
        'stock_id',
        'capacite',
        'prix',
        'nombreDispo',
        'description',
    ];
    
    public function venteLaits(){
        return $this->hasMany('App\Models\VenteLait');
    }
    
    public function stokLait(){
        return $this->belongsTo('App\Models\StockLait');
    }
    
}
