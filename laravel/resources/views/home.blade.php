@include('partials/head')
@include('partials/nav')

@php
    $auth = Auth::check();
@endphp


<div class="main-container">
    <div class="card-container fnt-main">
        
        @foreach ($auctions as $auction)
            <div class="my-card {{ count($auction->pecaleilao) > 1 ? 'card-bundle' : ''}}" data-auction-id={{$auction->id}}>
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
                            if ($active == null)
                                echo 'N/A';
                            elseif( $active->preco_final != null)
                                echo $active->preco_final;
                            else
                                echo $active->preco_inicial;
                        
                        @endphp
                    </p>
                    <a href="{{ route('auction', ['id' => $auction->id]) }}" class="my-card-bid-btn btn btn-dark {{!$auth ? 'disabled' : ''}}">Licitar</a>
                </div>
            </div>
        @endforeach 

</div>

@include('partials/footer')

<script src="{{ asset('js/app.js')}}" defer></script>
<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/homepage.js') }}" defer></script>

</body>
</html>