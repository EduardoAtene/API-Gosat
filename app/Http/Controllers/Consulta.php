<?php

namespace App\Http\Controllers;

use App\Models\Cpf;
use App\Models\Cpf_Instituicao;
use App\Models\Instituicao;
use App\Models\Instituicao_Modalidade;
use App\Models\Modalidade;
use App\Models\Oferta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Consulta extends Controller
{
    public function index(Request $request){

        $mensagem = $request->session()->get('mensagem.sucess');

        $cpf = Cpf::query()->get();
        return view("offer.index")->with("cpf",$cpf)
                                  ->with("mensagem",$mensagem);
    }

    public function create(){

        return view("offer.create");
    }

    public function store(Request $request){
        $cpfRequest =  $request->cpf;
        $cpf = new Cpf();
        $cpf->cpf = $cpfRequest;
        $cpf->save();

        $responseOferta = Http::post('https://dev.gosat.org/api/v1/simulacao/credito', [
        'cpf' => $cpfRequest
        ])->object();
        foreach ($responseOferta->instituicoes as $instituicaoU) {
            $instituicao = new Instituicao();
            $instituicao->nome = $instituicaoU->nome;
            $instituicao->api_id = $instituicaoU->id;
            $instituicao->save();

            $cpf_instituicao = new Cpf_Instituicao();
            $cpf_instituicao->instituicao_id = $instituicao->id;
            $cpf_instituicao->cpf_id =  $cpf->id;
            $cpf_instituicao->save();

            foreach ($instituicaoU->modalidades as $modalidadeU) {
                $modalidade = new Modalidade();
                $modalidade->cod = $modalidadeU->cod;
                $modalidade->nome = $modalidadeU->nome;
                $modalidade->save();

                $instituicao_modalidade = new Instituicao_Modalidade();
                $instituicao_modalidade->instituicao_id = $instituicao->id;
                $instituicao_modalidade->modalidade_id =  $modalidade->id;
                $instituicao_modalidade->save();

                $responseOferta = Http::post('https://dev.gosat.org/api/v1/simulacao/oferta', [
                                'cpf' => $cpf->cpf,
                                'instituicao_id' => $instituicaoU->id,
                                'codModalidade' => $modalidade->cod,
                    ])->object();

                $oferta = new Oferta();
                $oferta->cpf_id =  $cpf->id;
                $oferta->instituicao_id = $instituicao->id;
                $oferta->modalidade_id =  $modalidade->id;
                $oferta->qntParcelaMin =  $responseOferta->QntParcelaMin;
                $oferta->qntParcelaMax =  $responseOferta->QntParcelaMax;
                $oferta->valorMin =  $responseOferta->valorMin;
                $oferta->valorMax =  $responseOferta->valorMax;
                $oferta->jurosMes =  $responseOferta->jurosMes;
                $oferta->save();
            }
        }

        $request->session()->flash('mensagem.sucess',"CPF Cadastrado. Cliquei para visuailzar!");
        return to_route("consulta.index");
    }

    public function show(Request $request){
        $cpf = $request->cpf;
        $responseCredito = Http::get('http://127.0.0.1:8002/api/v1/simulacao/credito', [
                'cpf' => $cpf
        ])->object();
        return view("offer.show",compact("responseCredito"));
    }
}
