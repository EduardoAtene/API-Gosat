<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreditoRequest;
use App\Models\Cpf;
use App\Models\Cpf_Instituicao;
use App\Models\Instituicao;
use App\Models\Instituicao_Modalidade;
use App\Models\Modalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CreditoController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CreditoRequest $request){
        
        // Search in Database System
        // $responseCredito = "";
        // $cpf = (Cpf::query()->where("cpf",$request->cpf)->get())[0];
        // if(isset($cpf)){
        //     $instituicaoesArray = array();
        //     $Cpf_Instituicoes = (Cpf_Instituicao::query()->where("cpf_id",$cpf->id)->get());
        //     foreach($Cpf_Instituicoes as $Cpf_Instituicao){
        //         $instituicao = (Instituicao::query()->where("id",$Cpf_Instituicao->instituicao_id)->get())[0];

        //         $modalidadesArray = array();
        //         $Instituicao_Modalidades = (Instituicao_Modalidade::query()->where("instituicao_id",$instituicao->id)->get());
        //         foreach($Instituicao_Modalidades as $Instituicao_Modalidade){
        //             $modalidade = (Modalidade::query()->where("id",$Instituicao_Modalidade->modalidade_id)->get())[0];
        //             array_push($modalidadesArray, array(  "nome" => $modalidade->nome,
        //                                             "cod"  => $modalidade->cod));
        //         }

        //         array_push($instituicaoesArray,array(    'id'=>$instituicao->api_id,
        //                                         'nome'=>$instituicao->nome,
        //                                         'modalidades'=>$modalidadesArray));
        //     }
        //     $responseCredito = array("instituicoes" => $instituicaoesArray);
        // }


        // API Request Gosat
        $responseCredito = Http::post('https://dev.gosat.org/api/v1/simulacao/credito', [
            'cpf' => $request->cpf
            ])->object();
        return response()->json($responseCredito);



    }
}