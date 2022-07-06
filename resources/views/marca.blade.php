@extends("layout")
@section("conteudo")
    <div class="col-2">
         {{-- @if (isset($listaMarca) && count($listaMarca) > 0) --}}
        <div class="list-group">
            <a href="{{ route ('marcas') }}" class="list-group-item list-group-item-action">Todas </a>
            @foreach($listaMarca as $marca)
               <a href="{{ route('marcas', ['idmarca' => $marca->id]) }}" class="list-group-item list-group-item-action @if($marca->id === $idMarca) active @endif">{{ $marca->nome }}</a>
            @endforeach
         {{-- @endif --}}
        </div>
    </div>
    <div class="col-10">

    @include("_produtos", [ 'lista' => $lista])
    </div>
@endsection 