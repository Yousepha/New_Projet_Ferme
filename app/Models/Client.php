<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id'
    ];
    public function commandes(){
        return $this->hasMany('App\Models\Commande');
    }
    public $incrementing = false;
    protected $primaryKey = 'user_id';
    
}
