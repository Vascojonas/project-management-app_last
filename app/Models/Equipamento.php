<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;


    protected $fillable = [
        'dh',
        'jh',
        'sh',
        'ah',
        'ph',
        'eh',
        'ch',
        'moh',
        'mh',
        'lh',
        'valorAluguel',
        'totalP',
        'totalIp',
        'actividade_id',
    ];

    public function actividade()
    {
        return $this->belongsTo(Actividade::class);
    }


            
}
