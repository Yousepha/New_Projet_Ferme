<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;

    protected $primaryKey ='idFacture';
    protected $fillable = [
        'montant',
        'datePaiement',
        'commande_id',
        'moyenDePaiement'
    ];
   
}
