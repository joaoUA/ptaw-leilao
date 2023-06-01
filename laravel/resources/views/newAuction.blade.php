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
                    <i class="bi bi-file-earmark-image"></i>
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
            <tr>
                <th scope="row" class="fnt-s">1</th>
                <td>
                    <i class="bi bi-card-image"></i>
                </td>
                <td class="fnt-s">Nome do Artigo</td>
                <td class="fnt-s">100.00€</td>
                <td>
                    <i class="bi bi-brush-fill"></i>
                </td>
                <td>
                    <i class="bi bi-check-square"></i>
                </td>
            </tr>
            <tr>
                <th scope="row" class="fnt-s">2</th>
                <td>
                    <i class="bi bi-card-image"></i>
                </td>
                <td class="fnt-s">Nome do Artigo</td>
                <td class="fnt-main fnt-s">100.00€</td>
                <td>
                    <i class="bi bi-brush-fill"></i>
                </td>
                <td>
                    <i class="bi bi-dash-square-dotted"></i>
                </td>
            </tr>
        </tbody>
    </table>

    <div id="ca-options">
        <p class="">Leiloar como artigo único</p>

        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
        </div>

        <div class="input-group">
            <input type="text" name="" id="" class="form-control fnt-main fnt-s" placeholder="€" disabled>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-dark bkg-terciary cl-primary  fnt-main fnt-s">
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
                        <input type="text" class="col form-control fnt-s" name="artigo-nome" id="artigo-nome"
                            placeholder="Nome do artigo">
                    </div>

                    <div class="p-1 d-flex justify-content-between gap-2">
                        <input type="text" class="form-control fnt-s" name="artigo-preco" id="artigo-preco"
                            placeholder="Preço">
                        <select class="form-select form-control fnt-s" id="artigo-categoria">
                            <option value="" selected class="fnt-s">Categoria</option>
                        </select>
                    </div>

                    <div id="article-img-container">
                        <img src="./img/img-placeholder-114.png" class="img-thumbnail" alt="...">
                        <img src="./img/img-placeholder-48.png" alt="" srcset="" class="img-thumbnail">
                        <img src="./img/img-placeholder-48.png" alt="" srcset="" class="img-thumbnail">
                        <img src="./img/img-placeholder-48.png" alt="" srcset="" class="img-thumbnail">
                        <img src="./img/img-placeholder-48.png" alt="" srcset="" class="img-thumbnail">
                    </div>

                    <div class="mb-3 p-1" id="file-group">
                        <label for="formFile" class="mx-1 form-label fnt-s">Documento de Autenticação
                            (Opcional)</label>
                        <input class="form-control fnt-s" type="file" id="formFile">
                    </div>

                    <div class="p-1 d-grid gap-2">
                        <button class="btn btn-light fnt-s bkg-primary cl-terciary" type="button"
                            data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                        <button class="btn btn-dark bkg-terciary cl-primary fnt-s"
                            type="button">Confirmar</button>
                        <button class="btn btn-danger bkg-secondary cl-primary fnt-s"
                            type="button">Remover</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('partials/footer')