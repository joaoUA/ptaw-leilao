@include('partials/head')
@include('partials/nav')

<div id="wallet-main-container" class="main-container">
    @include('partials/profileSideNavigation')
    <section>
        <h3 class="fnt-xl">A Minha Carteira</h3>
        <table class="table table-striped table-hover">
            <thead class="border-bottom border-dark fnt-s">
                <tr class="cl-terciary">
                    <th scope="col" class="">Cartão de Crédito</th>
                    <th scope="col" class="">Nome</th>
                    <th scope="col" class="">Validade</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="cl-terciary">
                    <td class="">Master Card</td>
                    <td class="">Frederico Razão</td>
                    <td class="">2026/09</td>
                    <td>
                        <button type="button" class="btn fa-solid fa-square-xmark fa-xl p-1"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
                    </td>
                </tr>
                <tr class="cl-terciary">
                    <td class="">BPN</td>
                    <td class="">João Oliveira</td>
                    <td class="">2025/03</td>
                    <td>
                        <button type="button" class="btn fa-solid fa-square-xmark fa-xl p-1"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"></button>
                    </td>
                </tr>
            </tbody>
        </table>

        <div id="add-credit-card" class="d-flex flex-column gap-2 fnt-main">
            <h4 class="border-bottom border-3 border-dark pb-2 m-0 fnt-xl">Adicionar Cartão
            </h4>
            <div class="d-flex flex-column gap-3">
                <input type="text" class="form-control  fnt-s" placeholder="Nome do Cartão">
                <input type="text" class="form-control  fnt-s" placeholder="Número do Cartão">
                <div class="d-flex justify-content-between gap-2">
                    <input type="text" class="form-control w-50 fnt-s" maxlength="2" placeholder="MM">
                    <input type="text" class="form-control w-50 fnt-s" maxlength="2" placeholder="AA">
                    <input type="text" class="form-control w-50 fnt-s" maxlength="3" placeholder="CVC">
                </div>
                <div class="d-flex justify-content-between gap-2">
                    <button class=" form-control btn btn-light bkg-primary cl-terciary fnt-s">Cancelar</button>
                    <button
                        class="form-control btn btn-dark bkg-terciary cl-primary fnt-s border-0">Confirmar</button>
                </div>
            </div>
        </div>

    </section>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered text-center">
            <div class="modal-content">
                <div class="my-modal-body">
                    <p>Tem certeza que pretende eliminar o cartão ?</p>
                    <div class="modal-btn-container">
                        <button type="button" class="btn btn-light bkg-primary cl-terciary"
                            data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-dark bkg-terciary cl-primary">
                            Confirmar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials/footer')