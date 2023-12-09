<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'imagem'];

    public function rules()
    {
        return [

            'nome' => "required|unique:marcas,nome'.$this->id.'|min:3",
            'imagem' => 'required'
        ];
    }

    public function feedback()
    {
        return [

            'required' => 'O campo :attribute é obrigatório',
            'nome.unique' => 'Esta marca ja esta cadastrada.',
            'nome.min'=>'A marca dever ter no minimo 3 caracteres.'
        ];
    }
}
