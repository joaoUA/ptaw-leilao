@include('partials/head')
@include('partials/nav')

<div class="main-container auction-main-container">
    <div>
        @if ($auctionItemsCount > 1)
        @foreach ($auction->pecaleilao as $item)
            @php
                $estado = '';

                if ($item->estado->nome == 'Ativo') {
                    $estado = 'current';
                } elseif ($item->estado->nome == 'Terminado') {
                    $estado = 'past';
                } else {
                    $estado = '';
                }

                $nome = '';

                if ($item->pecaarte[0] != null)
                    $nome = $item->pecaarte[0]->nome;
                else {
                    $nome = '';
                }
            @endphp
            <div class="auction-prev-item {{$estado}}">
                <img src=".\img\img-placeholder-48.png" alt="">
                <p>{{$nome}}</p>
            </div>
        @endforeach            
        @endif
    </div>
    <div class="auction">
        <div id="carouselIndicators" class="carousel slide w-50 border border-dark-subtle">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0"
                    class="active border bg-dark" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1"
                    class="border bg-dark" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2"
                    class="border bg-dark" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('img/img-placeholder-360.png')}}" class="d-block w-100" alt="image">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/img-placeholder-360.png')}}" class="d-block w-100" alt="image">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('img/img-placeholder-360.png')}}" class="d-block w-100" alt="image">
                </div>
            </div>
            <button class="carousel-control-prev bg-dark" type="button" data-bs-target="#carouselIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next bg-dark" type="button" data-bs-target="#carouselIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Seguinte</span>
            </button>
        </div>
        <div class="auction-info-container">
            <h1>{{$auction->descricao}}</h1>
            <h4>{{$auction->vendedor->nome}}</h4>
            <div>
                <p>{{$activeAuction->pecaarte[0]->categoria->nome}}</p>
                @if($activeAuction->pecaarte[0]->autenticado)
                    <div class="badge bg-success">Verificado</div>
                @endif
            </div>
            <p>{{$activeAuction->pecaarte[0]->nome}}</p>
            <div class="auction-bid-container">
                <h1 id="highest-bid">{{$activeAuction->preco_final != null ? $activeAuction->preco_final : $activeAuction->preco_inicial}}€</h1>
                <h2>99:99</h2>
            </div>
            <div class="auction-form-container">
                <input type="number" id="bid-input-field" class="form-control" name="licitacao-input" placeholder="Licitação" {{!$userValid ? 'disabled' : ''}}>
                <button id="btn-bid" data-auction-id={{$auction->id}} data-auction-item-id={{$activeAuction->id}} data-user-id={{Auth::user()->id}} class="form-control btn btn-dark bkg-terciary cl-primary fnt-s {{!$userValid ? 'disabled' : ''}}">Licitar</button>
            </div>
        </div>
    </div>
    <div></div>
    </div>

@include('partials/footer')

<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/auctionpage.js') }}" defer></script>

</body>
</html>