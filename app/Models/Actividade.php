<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividade extends Model
{
    use HasFactory;

    protected $fillable = [
        'codigo',
        'designacao',
        'coeficiente',
        'quantidade',
        'unidade',
        'preco_unitario',
        'preco_final',
        'projecto_id',
    ];

    public function projecto()
    {
        return $this->belongsTo(Projecto::class);
    }

    public function equipamento()
    {
        return $this->hasOne(Equipamento::class);
    }

    
}
