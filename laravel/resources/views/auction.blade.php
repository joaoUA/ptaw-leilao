@include('partials/head')
@include('partials/nav')

<div class="main-container auction-main-container">
    <div></div>
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
            <h1>Título do Artigo</h1>
            <h4>{{$auction->vendedor->nome}}</h4>
            @php
                $active = null;
                foreach ($auction->pecaleilao as $item) {
                    if ($item->estado->nome == 'Ativo') {
                        $active = $item;
                        break;
                    }
                }

                //todo
                // if ($active != null) 
                // lidar com o caso de nao haver itens ativos               
            @endphp
            <div>
                <p>{{$active->pecaarte[0]->categoria->nome}}</p>
                @if ($active->pecaarte[0]->autenticado == 1)
                    <div class="badge bg-success">Verificado</div>
                @endif
            </div>
            <p>{{$auction->descricao}}</p>
            <div class="auction-bid-container">
                <h1>{{$active->preco_inicial}}</h1>
                <h2>99:99</h2>
            </div>
            <div class="auction-form-container">
                <input type="number" class="form-control" name="licitacao-input" id="" placeholder="Licitação">
                <button class="form-control btn btn-dark bkg-terciary cl-primary fnt-s">Licitar</button>
            </div>
        </div>
    </div>
    <div></div>
    </div>

@include('partials/footer')