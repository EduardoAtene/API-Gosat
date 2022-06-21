<x-loginSctruc title="Cadastrar CPF">
    <form action="{{route('consulta.store')}}" method="post">
        @csrf
        <div class="container">
            <div class="row justify-content-between">
                    <div class="col-lg-12">
                        <div class="h2">Cadastrar CPF</div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="cpf" class="form-label"> Digite o CPF para Consultar Ofertas</label>
                            <input type="text" id="cpf" name="cpf" class="form-control"/>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-5 aligm-items-center">
                        <button type="submit" class="btn btn-dark"> Cadastrar CPF</button>
                    </div>
            </div>
        </div>

    </form>
</x-loginSctruc>