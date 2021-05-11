<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;
    protected $primaryKey = "idUtilisateur";
    protected $fillable = [
        'nom',
        'prenom',
        'photo',
        'telephone',
        'adresse',
        'login',
        'password',
        'profile'
    ];
    
}
