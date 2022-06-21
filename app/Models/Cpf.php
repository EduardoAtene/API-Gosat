<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpf extends Model
{
    use HasFactory;

    protected $table = 'cpf';

    protected $fillable = [
        'cpf'
    ];


}
