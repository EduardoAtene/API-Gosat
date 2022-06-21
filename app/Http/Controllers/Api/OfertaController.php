<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OfertaRequest;
use App\Models\Cpf;
use App\Models\Instituicao;
use App\Models\Modalidade;
use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OfertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OfertaRequest $request){
        
        // Search in Database System
        // $responseOferta = "";
        // $cpf = ( Cpf::query()->where("cpf",$request->cpf)->get() )[0];
        // $instituicao = ( Instituicao::query()->where("api_id",$request->instituicao_id)->get() )[0];
        // $modalidade = ( Modalidade::query()->where("cod",$request->codModalidade)->get() )[0];
        // $oferta = ( Oferta::query() ->where("cpf_id",$cpf->id)
        //                             ->where("instituicao_id",$instituicao->id)
        //                             ->where("modalidade_id",$modalidade->id)->get() );
        // if(isset($oferta[0])){
        //     $responseOferta = array(    'QntParcelaMin' => $oferta->qntParcelaMin,
        //                                 'QntParcelaMax' =>$oferta->qntParcelaMax,
        //                                 'valorMin' => $oferta->valorMin,
        //                                 'valorMax' => $oferta->valorMax,
        //                                 'jurosMes' =>$oferta->jurosMes);
        // }


        // API Request Gosat
        $responseOferta = Http::post('https://dev.gosat.org/api/v1/simulacao/oferta', [
                'cpf' => $request->cpf,
                'instituicao_id' => $request->instituicao_id,
                'codModalidade' => $request->codModalidade,
        ])->object();
        return response()->json($responseOferta);



    }

}
