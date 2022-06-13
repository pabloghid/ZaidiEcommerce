@extends("layout")
@section("conteudo")
    @if (isset($listaCategoria) && count($listaCategoria) > 0)
        <ul>
            <li><a href="{{ route ('categoria') }}">Todas </a></li>
            @foreach($listaCategoria as $cat)
                <li><a href="{{ route('categoria_por_id', ['idcategoria' => $cat->id]) }}">{{ $cat->categoria}}</a></li>
            @endforeach
        </ul>
    @endif

    @include("_produtos", [ 'lista' => $lista])
@endsection