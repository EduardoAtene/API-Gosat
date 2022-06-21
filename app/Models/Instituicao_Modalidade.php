<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao_Modalidade extends Model
{
    use HasFactory;

    protected $table = 'instituicao_modalidade';

    protected $fillable = [
        'instituicao_id',
        'modalidade_id'
    ];

}
