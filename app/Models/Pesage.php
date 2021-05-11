<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesage extends Model
{   
    use HasFactory;
    protected $primaryKey ='idPesage';

    protected $fillable = [
        'bovin_id',
        'datePesee',
        'poids'
    ];

    public function bovin(){
        return $this->belongsTo('App\Models\Bovin');
    }
}
