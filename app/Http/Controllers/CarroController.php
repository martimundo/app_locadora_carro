<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use App\Http\Requests\StoreCarroRequest;
use App\Http\Requests\UpdateCarroRequest;

class CarroController extends Controller
{
    private $carro;

    public function __construct(Carro $carro)
    {
        $this->carro = $carro;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = $this->carro->all();
        return $carros;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCarroRequest $request)
    {

        $request->validate($request->rules());

        $carro = $this->carro->create($request->all());
        return response()->json($carro, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carro = $this->carro->find($id);

        if ($carro == null) {
            return "Veiculo não encontardo";
        }

        return response()->json($carro, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function edit(Carro $carro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarroRequest  $request
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCarroRequest $request, $id)
    {
        $carro = $this->carro->find($id);

        //dd($request->all());

        if ($carro === null) {

            return response()->json(['error' => 'O veiculo não existe'], 404);
        }

        if($request->method['PATCH']){

            $dinamicRules=[];

            foreach($carro->rules() as $input => $regra){

                if(array_key_exists($input, $request->all())){

                    $dinamicRules[$input]=$regra;
                }
                $request->validate($carro->rules(), $carro->feedback());
            }            
        }else{

            $request->validate($carro->rules(), $carro->feedback());
        }
        $carro->update([

            'modelo_id',
            'placa',
            'disponivel',
            'km'
        ]);

        return $carro;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carro  $carro
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carro = $this->carro->find($id);

        if ($carro === null) {
            return response()->json(['error' => 'Não é possivel remover o carro'], 404);
        }
        $carro->delete($id);

        return response()->json(['success'=>'Veiculo removido com sucesso'], 200);
    }
}
