<x-inicialStruct title="Relatório">
    <div class="col-lg-12 shadow-lg p-4 mb-5 bg-white rounded  w-100 h-100">
    
        <div class="container">
            <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <div class="h2">CPF Crédtio </div>
                    </div>

                    <div class="container">
                        <div class="row">

                            @for($i = 0; $i < count($responseCredito->instituicoes); $i++)
                                    <div style="max-width: 18rem;" class="card mb-3 col-lg-3 m-1" style="width: 18rem;">
                                        <div class="text-white bg-dark  card-header">
                                            <b>{{$responseCredito->instituicoes[$i]->nome}}</b>
                                        </div>
                                        @for($x = 0; $x < count($responseCredito->instituicoes[$i]->modalidades); $x++)
                                        <ul class="list-group list-group-flush">
                                                <li class="  list-group-item">{{$responseCredito->instituicoes[$i]->modalidades[$x]->nome}}</li>
                                            </ul>
                                        @endfor

                                    </div>

                            @endfor
                        </div>

                    </div>

                    <div class="col-lg-12 mt-5 aligm-items-center">
                        <a href="{{route('consulta.index')}}"><button class="btn btn-dark btn-lg"> Voltar</button></a>
                    </div>

            </div>
        </div>
    </div>

</x-inicialStruct>