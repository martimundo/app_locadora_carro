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

    public function rules(){
        return[

            "modelo_id"=>"required|unique:modelos,nome".$this->id,
            "placa"=>"required|max:8",
            "disponivel"=>"required|boolean",
            "km"=>"required"

        ];

    }
    public function feedback(){
        return[

            "required"=>"O campo :attribute é obrigatório",
            "placa.max"=>"A placa não pode ter mais que 8 caracteres",
            
        ];
    }

}
