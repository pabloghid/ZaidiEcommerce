@extends("layoutAdmin")
@section("conteudo")
<div class="row d-flex justify-content-center align-items-center">
    <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem">
            <div class="card-body p-4">
                <div class="row g-0">

                    <h2 style=" font-weight: bold; padding: 5px;  text-align: center;">
                        Editando Categoria {{ $categoria->categoria }} </h2>

                    {!! Form::open(['route'=> ["categoriasAdmin.update", 'id'=>$categoria->id], 'method'=>'put']) !!}
                    <div class="form-group mt-3">
                        <h5 class="fw-normal mt-3" style="letter-spacing: 1px;">Nome da categoria:</h5>
                        {!! Form::text('nome', $categoria->categoria, ['class'=>'form-control', 'required']) !!}
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