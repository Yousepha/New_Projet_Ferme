<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AchatBovin extends Model
{
    use HasFactory;
    protected $primaryKey = 'idAchat';

    protected $fillable = [
        'bovin_id',
        'admin_id',
        'montantBovin',
        'dateAchatBovin'
    ];
    
    public function bovin(){
        return $this->belongsTo('App\Models\Bovin');
    }

    public function admin(){
        return $this->belongsTo('App\Models\Admin');
    }
    
}
