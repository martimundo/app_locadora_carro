<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca_id',
        'nome',
        'imagem',
        'numero_portas',
        'air_bag',
        'lugares',
        'abs'
    ];

    public function marca(): HasOne
    {
        return $this->hasOne(Marca::class);
    }
}
