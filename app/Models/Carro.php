<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Carro extends Model
{
    use HasFactory;

    protected $fillable=[

        'modelo_id',
        'placa',
        'disponivel',
        'km'
    ];

    public function modelo():HasOne{

        return $this->hasOne(Modelo::class);
    }
}
