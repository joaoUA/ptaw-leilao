@include('partials/head')
@include('partials/nav')

<div class="main-container">
    <div id="vt-container" class="fnt-main">
        <div id="auction-vt" class="vt">
            <div class="vt-item vt-title">
                <p class="vt-item-name">Leilões a Verificar</p>
            </div>
            @foreach ($auctions as $auction)
                <div class="vt-item" data-bs-toggle="modal" data-bs-target="#ModalLeilao">
                    <img src="{{ asset('img/img-placeholder-48.png') }}" alt="placeholder">
                    <p class="vt-item-name">Título do Leilão</p>
                </div>
            @endforeach
        </div>

        <div id="seller-vt" class="vt cl-terciary fnt-m">
            <div class="vt-item vt-title bkg-terciary cl-primary">
                <p class="fnt-s">Vendedores a Verificar</p>
            </div>

            @foreach ($requests as $request)
                <div class="vt-item" data-request-id={{$request->id}} data-bs-toggle="modal" data-bs-target="#ModalVendedor">
                    <img src="{{asset('img/img-placeholder-48.png')}}" alt="placeholder">
                    <p class="vt-item-name">{{$request->utilizador->nome}}</p>
                    <p>{{$request->data_pedido}}</p>
                </div>
            @endforeach

        </div>
    </div>

    <div class="modal fade" id="ModalArtigo" tabindex="-1" aria-labelledby="ModalArtigoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-top-bar">
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#ModalLeilao"
                        aria-label="Close"></button>
                </div>
                <div id="modal-auction-item-details" class="my-modal-body">
                    <p>Detalhes do Artigo</p>
                    <img src=".\img\img-placeholder-224.png" alt="placeholder" />
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalVendedor" tabindex="-1" aria-labelledby="ModalVendedorLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-top-bar">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div data-request-id=0 id="modal-seller" class="my-modal-body">
                    <div class="modal-seller-item">
                        <p>Nome:</p>
                        <p id="modal-seller-name">---</p>
                    </div>
                    <div class="modal-seller-item">
                        <p>Data de Nascimento:</p>
                        <p id="modal-seller-birthday">---</p>
                    </div>
                    <div class="modal-seller-item">
                        <p>Morada:</p>
                        <p id="modal-seller-address">---</p>
                    </div>
                    <div class="modal-seller-item">
                        <p>E-mail:</p>
                        <p id="modal-seller-email">---</p>
                    </div>
                    <div class="modal-seller-item">
                        <p>NIF:</p>
                        <p id="modal-seller-nif">---</p>
                    </div>
                    <div class="modal-seller-item">
                        <p>IBAN:</p>
                        <p id="modal-seller-iban">---</p>
                    </div>
                    <div class="modal-btn-container">
                        <button type="button" id="btn-user-modal-reject-request" class="btn btn-light bkg-primary cl-terciary"
                            data-bs-dismiss="modal">Recusar</button>
                        <button type="button" id="btn-user-modal-confirm-request" class="btn btn-dark bkg-terciary cl-primary"
                            data-bs-dismiss="modal">Aprovar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalLeilao" tabindex="-1" aria-labelledby="ModalLeilaoLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-top-bar">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="modal-al" class="my-modal-body">
                    <div id="modal-al-header">
                        <p>Título do Leilão</p>
                        <p>Nome do Vendedor</p>
                    </div>
                    <div class="modal-auction-item">
                        <img src=".\img\img-placeholder-48.png" alt="placeholder" data-bs-toggle="modal"
                            data-bs-target="#ModalArtigo" />
                        <p class="">Artigo</p>
                        <div class="form-check form-switch">
                            <input class="toggle-pill form-check-input" type="checkbox" role="switch">
                        </div>
                    </div>
                    <div class="modal-auction-item">
                        <img src=".\img\img-placeholder-48.png" alt="placeholder" data-bs-toggle="modal"
                            data-bs-target="#ModalArtigo" />
                        <p class="">Artigo</p>
                        <div class="form-check form-switch">
                            <input class="toggle-pill form-check-input" type="checkbox" role="switch">
                        </div>
                    </div>
                    <div class="modal-btn-container">
                        <button type="button" class="btn btn-light bkg-primary cl-terciary"
                            data-bs-dismiss="modal">Recusar</button>
                        <button type="button" class="btn btn-dark bkg-terciary"
                            data-bs-dismiss="modal">Aprovar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials/footer')