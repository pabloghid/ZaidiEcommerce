<!-- iterando conteudo da lista para o produto -->
@if(isset($lista) && count($lista) > 0)
    @foreach($lista as $prod)
        <div class="col-2 mb-2">
            <div class="card">
                <img src="{{ asset('$prod -> foto') }}" class="card-img-top" />  
                <div class="card-body">
                    <h6 class="card-title">{{$prod->nome}} - R$ {{ $prod->valor }}</h6>
                    <a href="#" class="btn btn-sm btn-secundary">Adicionar Item</a>
                </div>
            </div>
        </div>
    @endforeach
@endif