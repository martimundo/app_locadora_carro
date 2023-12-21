<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    /**
     * Relacionamentos
    */

    //Pertence a 1 marca
    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class);
    }    

    public function rules()
    {
        return [

            'marca_id'=>'exists:marcas,id',
            'nome' => "required|min:3|unique:modelos,nome,".$this->id,
            'imagem' => 'required|file|mimes:png,jpg,jpeg,webp,svg,bitmap,gif',
            'numero_portas'=>'required|integer|digits_between:1,5',
            'lugares'=>'required|integer|digits_between:1,20',
            'air_bag'=>'required|boolean',
            'abs'=>'required|boolean'
            
        ];
    }

    public function feedback()
    {
        return [

            'required' => 'O campo :attribute é obrigatório',
            'nome.min'=>'O modelo dever ter no minimo 3 caracteres.',
            'imagem.file'=>'O tipo de arquivo não é válido',
        ];
    }
}
