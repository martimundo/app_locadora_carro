<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    private $cliente;


    public function __construct(Cliente $cliente)
    {
        return $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente = $this->cliente->all();

        if ($cliente == null) {
            return response()->json(['warning' => 'Sem clientes cadastrados'], 200);
        }
        return response()->json($cliente, 200);
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


        $validate = request($this->cliente->rules(), $this->cliente->feedback());

        $cliente = $this->cliente->create($request->all());

        return response()->json($cliente, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = $this->cliente->find($id);

        if ($cliente === null) {
            return response()->json(['error' => 'Cliente não encontrado!'], 404);
        }

        return response()->json($cliente, 202);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = request($this->cliente->rules(), $this->cliente->feedback());

        $cliente = $this->cliente->find($id);

        $cliente->update($request->all());

        return response()->json($cliente, 202);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=$this->cliente->find($id);

        $cliente->delete($id);

        return response()->json(['success'=>'Cliente excluido'], 202);
    }
}
