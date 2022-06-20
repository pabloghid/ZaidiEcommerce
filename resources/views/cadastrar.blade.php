@extends("layout")
@section("conteudo")
<div class="col-12">
    <div class="col-12">
        <h2 class="mb-3">Cadastrar clientes </h2>
    </div>

    <form action="{{ route('cadastrar_cliente') }}" method="post">
        <!-- metodo pra criar token automatico pra seguranca -->
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    Nome: <input type="text" name="nome" class="form-control" />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Email: <input type="email" name="email" class="form-control" />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    CPF: <input type="text" name="cpf" class="form-control" />
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    Senha: <input type="password" name="password" class="form-control" />
                </div>
            </div>
            <div class="col-8">
                <div class="form-group">
                    Enderço: <input type="text" name="endereço" class="form-control" />
                </div>
            </div>
            <div class="col-1">
                <div class="form-group">
                    Número: <input type="text" name="numero" class="form-control" />
                </div>
            </div>
            <div class="col-3">
                <div class="form-group">
                    Complemento: <input type="text" name="complemento" class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Cidade: <input type="text" name="cidade" class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    CEP: <input type="text" name="cep" class="form-control" />
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    Estado: <input type="text" name="estado" class="form-control" />
                </div>
            </div>
            <input type="submit" value="Cadastrar" class="btn btn-sucess btn-sm" />
        </div>
    </form> 
</div>
@endsection