<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Briquedos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;

class BrinquedosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dadosbrinquedos = Brinquedos::all();
        $contador = $dadosbrinquedos->count();

        return 'Brinquedos'.$contador. Response()->json([],Response::HTTP_NO_CONTENT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dadosbrinquedos = $request->all();


        $valida = Validator::make($dadosbrinquedos,[
            'nomebrinquedo' => 'required',
            'anobriquedo' => 'required',
            'dtmanutecaobrinquedo' => 'required',
            'funresponsavel'=> 'required',
        ]);

        if($valida->fails()){
            return 'Dados inválidos' . $valida->errors(true). 500;
        }

        $brinquedosBanco = Brinquedos::create($valida);

        if($brinquedosBanco){
            return 'Novo brinquedo cadastrado' . Response()->json([],Response::HTTP_NO_CONTENT);
        } else {
            return 'Novo brinquedo não foi cadastrado' . Response()->json([],Response::HTTP_NO_CONTENT);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dadosbrinquedos = Brinquedos::find($id);
        $contador = $dadosbrinquedos->count();

        if($dadosbrinquedos){
            return 'Brinquedo(s) encontrados: '. $contador . ' - ' . $dadosbrinquedos.response()->json([],Response::HTTP_NO_CONTENT); 
        } else {
            return 'Brinquedo(s) não encontrados'.response()->json([],Response::HTTP_NO_CONTENT);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dadosbrinquedos = $request->all();

        $valida = validator::make($dadosbrinquedos,[
            'nomebrinquedo' => 'required',
            'anobriquedo' => 'required',
            'dtmanutecaobrinquedo' => 'required',
            'funresponsavel'=> 'required',
        ]);

        if($valida->fails()){
            return 'Erro validação!'.$valida->$errors();
        }
        $dadosbrinquedos = Brinquedos::find($id);
        $dadosbrinquedos->nomebrinquedo = $dadosbrinquedos['nomebrinquedos'];
        $dadosbrinquedos->anobriquedo = $dadosbrinquedos['anobriquedo'];
        $dadosbrinquedos->dtmanutecaobrinquedo = $dadosbrinquedos['dtmanutecaobrinquedo'];
        $dadosbrinquedos->funresponsavel = $dadosbrinquedos['funresponsavel'];

        $enviarBrinquedos = $dadosbrinquedos->save();
        
        if($enviarBrinquedos){
            return 'Dados do brinquedo alterado com sucesso'.response()->json([],Response::HTTP_NO_CONTENT);
        } else{
            return 'Os dados do brinquedo não foram alterados'.response()->json([],Response::HTTP_NO_CONTENT); 
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dadosbrinquedos = Brinquedos::find($id);
        if($dadosbrinquedos){
            $dadosbrinquedos->delete();
            return 'Os dados do brinquedo foram deletados com sucesso'. response()->json([],Response::HTTP_NO_CONTENT);
        } else {
            return 'Não foi possível deletar os dados do brinquedo'.response()->json([],Response::HTTP_NO_CONTENT);
        }
    }
}
