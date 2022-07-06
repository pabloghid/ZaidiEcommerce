@extends("layoutAdmin")
@section("conteudo")

<div class="row d-flex justify-content-center align-items-center h-100">
    <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem">
            <div class="card-body p-4">
                <div class="row g-0">

                    <h2 style=" font-weight: bold; padding: 5px;  text-align: center;">
                        Marcas </h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($marcas as $marca)


                            <tr>
                                <th scope="row">{{$marca->id}}</th>
                                <td>{{$marca->nome}} </td>
                                <td>
                                    <a href="{{route('marcasAdmin.edit', ['id'=>$marca->id]) }}"
                                        class="btn btn-sm  btn-success">Editar</a>
                                    <a href="{{route('marcasAdmin.destroy', ['id'=>$marca->id]) }}"
                                        class="btn btn-sm  btn-danger">Excluir</a>
                                    {{-- <a data-toggle="modal" data-target="#delete"
                                        class="btn btn-sm  btn-danger">Excluir</a> --}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <a href="{{route('marcasAdmin.create', []) }}" class="btn btn-success">Adicionar</a>
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
            <form action="{{route('marcasAdmin.destroy', ['id'=>$marca->id]) }}" method="get">
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