@extends("layoutAdmin")
@section("conteudo")

<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem">
            <div class="card-body p-4">
                <div class="row g-0">

                    <h2 style=" font-weight: bold; padding: 5px;  text-align: center;">
                        Produtos </h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Valor</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produtos as $produto)


                            <tr>
                                <th scope="row">{{$produto->id}}</th>
                                <td>{{$produto->nome}} </td>
                                <td>{{$produto->valor}} </td>
                                <td> {{\App\Models\Marca::find($produto->marca_id)->nome}} </td>
                                <td> {{\App\Models\Categoria::find($produto->categoria_id)->categoria}} </td>
                                <td>
                                    <a href="{{route('produtosAdmin.edit', ['id'=>$produto->id]) }}"
                                        class="btn btn-sm  btn-success">Editar</a>
                                    <a href="{{route('produtosAdmin.destroy', ['id'=>$produto->id]) }}"
                                        class="btn btn-sm  btn-danger">Excluir</a>
                                    {{-- <a data-toggle="modal" data-target="#delete"
                                        class="btn btn-sm  btn-danger">Excluir</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{route('produtosAdmin.create', []) }}" class="btn btn-success">Adicionar</a>
            </div>
        </div>
    </div>
</div>
{{-- <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="myModalLabel">Confirmar exclusão</h4>
            </div>
            <form action="{{route('produtosAdmin.destroy', ['id'=>$produto->id]) }}" method="get">
                <div class="modal-body">
                    <p class="text-center">
                        Tem certeza que deseja excluir?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Não, cancelar</button>
                    <button type="submit" class="btn btn-warning">Sim, excluir</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
@endsection