<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatAliment extends Model
{   
    use HasFactory;
    protected $primaryKey = 'idAchatAliment';
    protected $fillable = [
        'admin_id',
        'nomAliment',
        'quantite',
        'quantite_consommee',
        'montant',
        'prixUnitaire',
        'dateAchatAliment'
    ];
    
    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }
}
