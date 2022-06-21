<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpf_Instituicao extends Model
{
    use HasFactory;

    protected $table = 'cpf_instituicao';

    protected $fillable = [
        'cpf_id',
        'instituicao_id'
    ];
    
}
