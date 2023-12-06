<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    use HasFactory;
    protected $table = 'locacoes';

    public function clientes(){
        return $this->belongsToMany(Cliente::class);
    }

    public function carros(){
        return $this->belongsToMany(Carro::class);
    }
}
