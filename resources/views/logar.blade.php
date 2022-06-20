@extends("layout")
@section("conteudo")

    <div class="col-12">
        <h2 class="mb-3">Logar no sistema</h2>

        <form action="{{ route('logar') }}" method="post">
            @csrf
            <div class="form-group">
                Login:
                <input type="text" name="login" class="form-control">
            </div>


            <div class="form-group">
                Senha:
                <input type="password" name="login" class="form-control">
            </div>

            <input type="submit" value="Logar" class="btn btn-lg btn-primary">
        </form>
    </div>

@endsection