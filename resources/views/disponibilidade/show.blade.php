<x-inicialStruct title="Relatório">
    <div class="col-lg-12 shadow-lg p-4 mb-5 bg-white rounded  w-100 h-100">
    
        <div class="container">
            <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <div class="h2">Relatório </div>
                    </div>

                    <div class="container">
                        <ul class="list-group">
                            <table class="table">
                                <thead>
                                  <tr>
                                    @foreach($responseCredito[0] as $key => $value)
                                        <th scope="col">{{$key}}</th>
                                    @endforeach
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach($responseCredito as $value)
                                        <tr>
                                            @foreach($value as $valueColum)
                                                <td>{{$valueColum}}</td>
                                            @endforeach
                                        </tr>
    
                                    @endforeach
                                </tbody>
                              </table>
                        </ul>
                    </div>

                    <div class="col-lg-12 mt-5 aligm-items-center">
                        <a href="{{route('consulta.index')}}"><button class="btn btn-dark btn-lg"> Voltar</button></a>
                    </div>

            </div>
        </div>
    </div>

</x-inicialStruct>