<!-- iterando conteudo da lista para o produto -->
@if(isset($lista))
<div class="row">
    @foreach($lista as $prod)
    <div class="col-2 mb-2">
        <div class="card">
            @if(asset($prod->foto))
            <img src="{{ asset($prod->foto) }}" class="card-img-top" />
            @else
            <img src="{{ asset("img/noImg.jpg") }}" class="card-img-top" />
            @endif
            <div class="card-body">
                <h6 class="card-title">{{$prod->nome}} - R$ {{ number_format($prod->valor, 2, ',', '.') }}</h6>
                <a href="{{ route ('adicionar_carrinho', [ 'idproduto' => $prod->id] ) }}"
                    class="btn btn-sm btn-primary">Adicionar ao Carrinho</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif