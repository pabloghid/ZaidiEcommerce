@extends("layoutAdmin")
@section("conteudo")
<div class="row d-flex justify-content-center align-items-center">
    <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem">
            <div class="card-body p-4">
                <div class="row g-0">

                    <h2 style="font-weight: bold; padding: 5px;  text-align: center;">
                        Cadastrar
                        um produto </h2>

                    {!! Form::open(['route'=>'produtosAdmin.store']) !!}
                    <div class="form-group mt-3">
                        <h5 class="fw-normal" style="letter-spacing: 1px;">Nome do produto:</h5>
                        {!! Form::text('nome', null, ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Valor:</h5>
                        {!! Form::text('valor', null, ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Foto:</h5>
                        {!! Form::text('foto', null, ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Descrição:</h5>
                        {!! Form::text('descricao', null, ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Marca:</h5>
                        {!! Form::select('marca_id', \App\Models\Marca::orderBy('id')->pluck('nome', 'id')->toArray(), null,
                        ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Categoria:</h5>
                        {!! Form::select('categoria_id', \App\Models\Categoria::orderBy('id')->pluck('categoria', 'id')->toArray(), null,
                        ['class'=>'form-control', 'required']) !!}
                    </div>
                    <div class="form-group mt-2">
                        {!! Form::submit('Criar', ['class'=>'btn btn-success']) !!}
                        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection