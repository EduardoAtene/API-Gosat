<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DisponibilidadeController extends Controller
{
    public function store(Request $request){
        $responseCredito = Http::get('http://127.0.0.1:8002/api/v1/simulacao/disponibilidade', [
                'cpf' => $request->cpf,
                'valorSolicitado' => $request->valorSolicitado,
                'qntParcelas' => $request->qntParcelas,
        ])->object();

        return view("disponibilidade.show",compact("responseCredito"));
    }
    public function index(Request $request){
        $cpf = array_keys($request->query())[0];

        return view("disponibilidade.index")->with("cpf",$cpf);
    }
}
