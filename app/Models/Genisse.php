<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genisse extends Model
{
    use HasFactory;
    protected $table = 'genisses';
    protected $fillable = [
        'idBovin',
        'codeBovin',
        'phase',
        'dateIA'
    ];
    protected $primaryKey = 'idBovin';
    public $incrementing = false;
   
}
