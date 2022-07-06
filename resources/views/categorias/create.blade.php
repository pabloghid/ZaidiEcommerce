@extends("layoutAdmin")
@section("conteudo")
<div class="row d-flex justify-content-center align-items-center">
    <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem">
            <div class="card-body p-4">
                <div class="row g-0">

                    <h2 style="font-weight: bold; padding: 5px;  text-align: center;">
                        Cadastrar
                        uma categoria </h2>

                    {!! Form::open(['route'=>'categoriasAdmin.store']) !!}
                    <div class="form-group mt-3">
                        <h5 class="fw-normal" style="letter-spacing: 1px;">Nome da categoria:</h5>
                        {!! Form::text('categoria', null, ['class'=>'form-control', 'required']) !!}
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