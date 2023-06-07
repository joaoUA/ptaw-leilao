@include('partials/head')
@include('partials/nav')

<div class="main-container">
    <div class="card-container fnt-main">
        @foreach ($auctions as $auction)
            <div class="my-card {{ count($auction->pecaleilao) > 1 ? 'card-bundle' : ''}}">
                <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
                <div class="my-card-sub">
                    <h5 class="my-card-title ">{{$auction->descricao}}</h5>
                    <p class=" my-card-timer">10:00</p>
                    <p class="text-danger fnt-m m-0 my-card-value">
                        @php
                            $active = null;
                            foreach ($auction->pecaleilao as $item) {
                                if ($item->estado->nome == 'Ativo') {
                                    $active = $item;
                                    break;
                                }
                            }
                            if ($active != null)
                                echo $active->preco_inicial;
                        
                        @endphp
                    </p>
                    <a href="/auction/{{$auction->id}}" class="my-card-bid-btn btn btn-dark">Licitar</a>
                </div>
            </div>
        @endforeach 

</div>

@include('partials/footer')