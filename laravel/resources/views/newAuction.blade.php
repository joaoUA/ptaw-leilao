@include('partials/head')
@include('partials/nav')


<div id="ca-main-container" class="main-container">
    <div id="table-section-heading">
        <input type="text" name="leilao-nome" id="input-leilao-nome" class="form-control"
            placeholder="Nome de Leilão">
        <button class="form-control btn btn-dark bkg-terciary cl-primary" data-bs-toggle="modal"
            data-bs-target="#adArtigoModal">Novo Artigo</button>
    </div>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="bkg-terciary cl-primary fs-5">
                <th scope="col">
                    <!--Número-->
                </th>
                <th scope="col">
                    <i class="bi bi-trash3"></i>
                </th>
                <th scope="col" class="w-50">
                    <!--Nome-->
                </th>
                <th scope="col">
                    <i class="bi bi-currency-euro"></i>
                </th>
                <th scope="col">
                    <i class="bi bi-tag-fill"></i>
                </th>
                <th scope="col">
                    <i class="bi bi-file-earmark-fill"></i>
                </th>
            </tr>
        </thead>
        <tbody class="table-group-divider fnt-main cl-terciary">
        </tbody>
    </table>

    <div id="ca-options">
        <p class="">Leiloar como artigo único</p>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" disabled id="flexSwitchCheckDefault">
        </div>

        <div class="input-group">
            <input type="number" name="" id="collectionPrice" class="form-control fnt-main fnt-s" placeholder="€" disabled>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-dark bkg-terciary cl-primary  fnt-main fnt-s" id="btn-submit-new-auction">
            Submeter
        </button>
    </div>
</div>
<div class="modal" id="adArtigoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content fnt-main">
            <div class="modal-header cl-terciary">
                <h5 class="modal-title fnt-m">Adicionar Artigo</h5>
            </div>

            <div class="my-modal-body">
                <form action="" class="form-control cl-terciary">
                    <div class="p-1">
                        <input type="text" class="col form-control fnt-s" required name="artigo-nome" id="artigo-nome"
                            placeholder="Nome do artigo">
                    </div>

                    <div class="p-1 d-flex justify-content-between gap-2">
                        <input type="text" class="form-control fnt-s" required name="artigo-artista" id="artigo-artista"
                            placeholder="Artista">
                        <input type="number" class="form-control fnt-s" required name="artigo-ano" id="artigo-ano"
                            placeholder="Ano">
                    </div>

                    <div class="p-1 d-flex justify-content-between gap-2">
                        <input type="number" class="form-control fnt-s w-50" required name="artigo-preco" id="artigo-preco"
                            placeholder="Preço">
                        <select class="form-select form-control fnt-s w-50" required  id="artigo-categoria">
                            <option value="" disabled selected class="fnt-s">Categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->nome}}">{{$category->nome}}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-3 p-2" id="file-group">
                        <label for="formFile" class="mx-1 form-label fnt-s" >Imagen,</label>
                        <input class="form-control fnt-s" type="file" id="imageInput" accept="image/png, image/jpeg"> 
                    </div>

                    <div class="mb-3 p-1" id="file-group">
                        <label for="formFile" class="mx-1 form-label fnt-s">Documento de Autenticação
                            (Opcional)</label>
                        <input class="form-control fnt-s" type="file" id="documentInput">
                    </div>

                    <div class="p-1 d-grid gap-2">
                        <button class="btn btn-light fnt-s bkg-primary cl-terciary" type="button"
                            data-bs-dismiss="modal" aria-label="Close" id="btn-cancel-new-auction">Cancelar</button>
                        <button class="btn btn-dark bkg-terciary cl-primary fnt-s"
                            type="button" id="btn-confirm-new-auction-item">Confirmar</button>
                    
                        <button class="btn btn-danger bkg-secondary cl-primary fnt-s" hidden
                            type="button">Remover</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('partials/footer')


<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/newauctionpage.js') }}" defer></script>

</body>
</html>