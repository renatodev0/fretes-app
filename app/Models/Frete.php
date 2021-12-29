<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frete extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'placa',
        'dono_veiculo',
        'valor',
        'data_inicio',
        'data_fim',
        'status'
    ];
}
