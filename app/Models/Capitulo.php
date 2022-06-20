<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'projecto_associado',
        'capitulo'
    ];


    public function projecto()
    {
        return $this->belongsTo(Projecto::class);
    }
    

    public function actividades()
    {
        return $this->hasMany(Actividade::class);
    }
}
