<x-loginSctruc title="Pesquisar CPF">
    <form action="{{route('disponibilidade.store')}}" method="post">
        @csrf
            <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <div class="h4">Consultar Disponibilidade</div>
                    </div>
                    <div class="col-lg-12">
                            <label for="valorSolicitado" class="form-label"> Digite o Valor Solicitado para Consultar Disponibilidade</label>
                            <input type="number" id="valorSolicitado" name="valorSolicitado" class="form-control"/>
                    </div>
                    <div class="col-lg-12">
                        <label for="qntParcelas" class="form-label"> Quantidade de Parcelas</label>
                        <input type="number" id="qntParcelas" name="qntParcelas" class="form-control"/>
                    </div>
                    <div class="col-lg-12 d-none">
                        <input type="text" id="cpf" name="cpf" class="form-control" value="{{str_replace("_",".",$cpf)}}"/>
                    </div>
                    <div class="col-lg-12 mt-2 aligm-items-center">
                        <button type="submit" class="btn btn-dark"> Consultar Disponibilidade</button>
                    </div>
            </div>
    </form>

</x-loginSctruc>