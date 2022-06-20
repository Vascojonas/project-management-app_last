<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nrProjecto',
        'descricao',
        'contratante',
        'localizacao',
        'quantidade',
        'preco_unitario',
        'prazo',
    ];

    public function capitulos()
    {
        return $this->hasMany(Capitulo::class);
    }

    public function actividades()
    {
        return $this->hasMany(Actividade::class);
    }

    public function custo()
    {
        return $this->hasOne(Custo::class);
    }
}
