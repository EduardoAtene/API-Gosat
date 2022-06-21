<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SimulacaoCreditoRequest;
use App\Models\Cpf;
use App\Models\Cpf_Instituicao;
use App\Models\Instituicao;
use App\Models\Instituicao_Modalidade;
use App\Models\Modalidade;
use App\Models\Oferta;
use Illuminate\Http\Request;

class SimulacaoCreditoController extends Controller
{
    public function index(SimulacaoCreditoRequest $request){

        $responseCredito = array();
        $cpf = Cpf::query()->where("cpf",$request->cpf)->first();
        if(isset($cpf)){
            $Cpf_Instituicoes = (Cpf_Instituicao::query()->where("cpf_id",$cpf->id)->get());
            foreach($Cpf_Instituicoes as $Cpf_Instituicao){
                $instituicao = Instituicao::query()->where("id",$Cpf_Instituicao->instituicao_id)->first();

                $Instituicao_Modalidades = (Instituicao_Modalidade::query()->where("instituicao_id",$instituicao->id)->get());
                foreach($Instituicao_Modalidades as $Instituicao_Modalidade){
                    $modalidade = Modalidade::query()->where("id",$Instituicao_Modalidade->modalidade_id)->first();

                    $oferta =   Oferta::query() ->where("cpf_id",$cpf->id)
                                                ->where("instituicao_id",$instituicao->id)
                                                ->where("modalidade_id",$modalidade->id)->first();

                    // Verificar se o valor solicitado está dentro dos parâmetros da instituição
                    // if(($request->qntParcelas >= $oferta->qntParcelaMin && $request->qntParcelas <= $oferta->qntParcelaMax)
                        // && ($request->valorSolicitado >= $oferta->valorMin && $request->valorSolicitado <= $oferta->valorMax)){
                            $calculoInstituicao = $this->calcularDisponibilidadeCredito($request,$oferta,$instituicao,$modalidade);
                            array_push($responseCredito,$calculoInstituicao);
                    // }    

                }
            }
        }else{
            $cpf = null;
        }

        return response()->json($this->ordernarByVantajoso($responseCredito));
    }

    private function calcularDisponibilidadeCredito(Request $request ,object $oferta,object $instituicao,object $modalidade){

        $valorSolicitado = $request->valorSolicitado;
        $qntParcelas = $request->qntParcelas;
        $valorParcelado = $valorSolicitado / $qntParcelas;
        $taxaJuros = $this->JurosSimples($valorParcelado,$oferta->jurosMes,$qntParcelas);
        $valorAPagar = $this->Montante($valorSolicitado,$taxaJuros);
        
        $responseCredito =array("   instituicaoFinanceira" => $instituicao->nome,
                                    "modalidadeCredito" => $modalidade->nome,
                                    "valorAPagar" => $valorAPagar,
                                    "valorSolicitado" => $valorSolicitado,
                                    "taxaJuros" => $taxaJuros,
                                    "qntParcelas" => $qntParcelas);
        return $responseCredito;
    }

    private function JurosSimples(Float $valorInformado, Float $taxaJuros,Int $quantidadeParcela){
        return number_format($valorInformado * $taxaJuros * $quantidadeParcela,2);
    }
    private function Montante(Float $valorInformado, Float $Juros){
        return number_format($valorInformado + $Juros,2);
    }

    private function ordernarByVantajoso(Array $responseCredito){
        $array = array_column($responseCredito, 'taxaJuros');
        array_multisort($array, SORT_ASC, $responseCredito);
        return $responseCredito;
    }
}
