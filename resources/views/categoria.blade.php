@extends("layout")
@section("conteudo")
    <div class="col-2">
         @if (isset($listaCategoria) && count($listaCategoria) > 0)
        <div class="list-group">
            <a href="{{ route ('categoria') }}" class="list-group-item list-group-item-action">Todas </a>
            @foreach($listaCategoria as $cat)
               <a href="{{ route('categoria_por_id', ['idcategoria' => $cat->id]) }}" class="list-group-item list-group-item-action @if($cat->id === $idcategoria) active @endif">{{ $cat->categoria}}</a>
            @endforeach
         @endif
        </div>
    </div>
    <div class="col-10">

    @include("_produtos", [ 'lista' => $lista])
    </div>
@endsection 