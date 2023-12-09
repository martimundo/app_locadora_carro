<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [

            'nome'
    ];

    public function rules(){

        return[
            'nome'=>"required|min:3|max:255"
        ];
    }

    public function feedback(){
        return[
            'nome.required'=>'O nome é obrigatório',
            'nome.min'=>'O campo nome precisa ter pelo menos 3 caracteres',
            'nome.max'=>'O campo nome precisa ter no máximo 255 caracteres'
        ];
    }
}
