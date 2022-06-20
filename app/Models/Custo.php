<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Custo extends Model
{
    use HasFactory;

    protected $fillable = [
            'projecto_id',
            'despesas_inicial',
            'administracao_local',
            'administracao_central',
            'despesas_finaceiras',
            'despesas_manutencao',
            'riscos',
            'despesa_1',
            'despesa_2',
            'despesa_3' ,
            'iva',
            'irps',
            'tributo_1',
            'tributo_2',
            'tributo_3',
            'lucro_bruto',
            'indutor_custo'
    ];

    public function projecto()
    {
        return $this->belongsTo(projecto::class) ;
    }
}
