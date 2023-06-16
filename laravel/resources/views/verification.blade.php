@include('partials/head')
@include('partials/nav')

<div class="main-container">
    <div id="vt-container" class="fnt-main">
        <div id="auction-vt" class="vt">
            <div class="vt-item vt-title">
                <p class="vt-item-name">Leilões a Verificar</p>
            </div>
            @foreach ($auctions as $auction)
                <div class="vt-item" data-auction-id={{$auction->id}} data-bs-toggle="modal" data-bs-target="#ModalLeilao">
                    <p class="vt-item-name">{{$auction->descricao}}</p>
                </div>
            @endforeach
        </div>

        <div id="seller-vt" class="vt cl-terciary fnt-m">
            <div class="vt-item vt-title bkg-terciary cl-primary">
                <p class="fnt-s">Vendedores a Verificar</p>
            </div>

            @foreach ($requests as $request)
                <div class="vt-item" data-request-id={{$request->id}} data-bs-toggle="modal" data-bs-target="#ModalVendedor">
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
                    <img id="modal-auction-item-image" src="" alt="placeholder" />
                    <p id="modal-auction-item-name"></p> <!--Nome-->
                    <p id="modal-auction-item-year"></p> <!--Ano-->
                    <p id="modal-auction-item-author"></p> <!--Autor-->
                    <p id="modal-auction-item-price"></p> <!--Preço-->
                    <p id="modal-auction-item-category"></p> <!--Categoria-->
                    <a href="" target="_blank" id="modal-auction-item-document" hidden>
                        <p>Documento de Autenticação</p>
                    </a>
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
                        <p id="modal-auction-name"></p> <!--Título-->
                        <p id="modal-auction-seller"></p> <!--Vendedor-->
                    </div>
                    <!--Peças Geradas Pelo JS-->
                    <div class="modal-btn-container">
                        <button type="button" class="btn btn-light bkg-primary cl-terciary"
                            data-bs-dismiss="modal" id="btn-auction-modal-reject-request">Recusar</button>
                        <button type="button" class="btn btn-dark bkg-terciary"
                            data-bs-dismiss="modal" id="btn-auction-modal-confirm-request">Aprovar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials/footer')

<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/verificationpage.js') }}" defer></script>

</body>
</html>