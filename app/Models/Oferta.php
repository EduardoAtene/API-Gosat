<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'oferta';
        
    protected $fillable = [
        'cpf_id',
        'instituicao_id',
        'modalidade_id',
        'qntParcelaMin',
        'qntParcelaMax',
        'valorMin',
        'valorMax',
        'jurosMes',
    ];
}
