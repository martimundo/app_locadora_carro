<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    protected $marca;

    public function __construct(Marca $marca)
    {
        $this->marca = $marca;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$marca = Marca::all();
        $marca = $this->marca->all();
        return $marca;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$marca = Marca::create($request->all());        

        $request->validate($this->marca->rules(), $this->marca->feedback());

        $marca = $this->marca->create($request->all());

        return response()->json($marca, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$marca = Marca::find($marca);
        $marca = $this->marca->find($id);

        if ($marca === null) {

            return response()->json(['error' => 'A marca não existe'], 404);
        }
        return $marca;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $marca = $this->marca->find($id);

        if ($marca === null) {

            return response()->json(['error' => 'Registro Inexistente'], 404);
        }

        if ($request->method('PATCH')) {

            $dinamicRules = [];

            foreach ($marca->rules() as $input => $regra) {

                if (array_key_exists($input, $request->all())) {

                    $dinamicRules[$input] = $regra;
                }
            }
            $request->validate($marca->rules(), $marca->feedback());
        } else {

            $request->validate($marca->rules(), $marca->feedback());
        }

        $marca->update($request->all());
        return $marca;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marca = $this->marca->find($id);

        if ($marca === null) {
            return response()->json(['error' => 'Não é possível excluir o registro.'], 404);
        }
        $marca->delete();
        return ['msg' => 'Maraca removida com sucesso'];
    }
}
