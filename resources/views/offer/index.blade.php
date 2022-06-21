<x-inicialStruct title="CPF's">
    <div class="col-lg-5 shadow-lg p-4 mb-5 bg-white rounded  w-50 h-50">
        
        @isset($mensagem)
            <div class="alert alert-success">
                {{$mensagem}}
            </div>
        @endisset
        <div class="container">
            <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <div class="h2">Consultar CPF</div>
                    </div>

                    <div class="container">
                        <ul class="list-group">
                            @foreach($cpf as $cpfn)
                                <li  class="list-group-item d-flex justify-content-between align-items-center"> 
                                        <div>
                                            {{$cpfn->cpf}}
                                        </div>
                                        <div>
                                            <span class="badge badge-primary badge-pill">
                                                <a href="{{route('api.credito.index',(array("cpf"=>$cpfn->cpf) ) )}}" style="color:white">
                                                    <button class="btn btn-dark btn-sm"> API Request</button> 
                                                </a>
                                            </span>
                                            <span class="badge badge-primary badge-pill">
                                                <a href="{{route('consulta.show',$cpfn->cpf)}}" style="color:white">
                                                    <button class="btn btn-dark btn-sm"> Ofertas</button> 
                                                </a>
                                            </span>
                                            <span class="badge badge-primary badge-pill">
                                                <a href="{{route('disponibilidade.index',$cpfn->cpf)}}" style="color:white">
                                                    <button class="btn btn-dark btn-sm"> Disponibilidade</button> 
                                                </a>
                                            </span>
                                        </div>

                                </li>
                                @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-12 mt-5 aligm-items-center">
                        <a href="{{route('consulta.create')}}"><button class="btn btn-dark btn-lg"> Cadastrar CPF</button></a>

                    </div>

            </div>
        </div>

    </div>
</x-inicialStruct>