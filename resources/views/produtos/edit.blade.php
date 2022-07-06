@extends("layoutAdmin")
@section("conteudo")
<div class="row d-flex justify-content-center align-items-center">
    <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem">
            <div class="card-body p-4">
                <div class="row g-0">

                    <h2 style=" font-weight: bold; padding: 5px;  text-align: center;">
                        Editando Produto {{ $produto->nome }} </h2>

                    {!! Form::open(['route'=> ["produtosAdmin.update", 'id'=>$produto->id], 'method'=>'put']) !!}
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Nome do produto:</h5>
                        {!! Form::text('nome', $produto->nome, ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Valor:</h5>
                        {!! Form::text('valor', $produto->valor, ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Foto:</h5>
                        {!! Form::text('foto', $produto->foto, ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Descrição:</h5>
                        {!! Form::text('descricao', $produto->descricao, ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Marca:</h5>
                        <select name="marca_id" class="form-control">
                            @foreach ($marcas as $marca)
                            <option value="{{ $marca['id'] }}" @if ($marca['id']==old('myselect', $produto->
                                marca_id))
                                selected="selected"
                                @endif
                                >{{ $marca['nome'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Categoria:</h5>
                        <select name="categoria_id" class="form-control">
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria['id'] }}" @if ($categoria['id']==old('myselect', $produto->
                                categoria_id))
                                selected="selected"
                                @endif
                                >{{ $categoria['categoria'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2">
                        {!! Form::submit('Editar', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection