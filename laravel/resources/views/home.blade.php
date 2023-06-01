@include('partials/head')
@include('partials/nav')

<div class="main-container">
    <div class="card-container fnt-main">
        <div class="my-card">
            <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
            <div class="my-card-sub">
                <h5 class="my-card-title ">Titulo xyz xpto assim assado asdjaskldjlka sjdlkasj lkajd
                    lkjaslkdj lk</h5>
                <p class=" my-card-timer">Timer</p>
                <p class="text-danger fnt-m m-0 my-card-value">100.00€</p>
                <a href="/auction" class="my-card-bid-btn btn btn-dark">Licitar</a>
            </div>
        </div>
        <div class="my-card card-bundle">
            <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
            <div class="my-card-sub">
                <h5 class="my-card-title ">Titulo xyz xpto assim assado asdjaskldjlka sjdlkasj lkajd
                    lkjaslkdj lk</h5>
                <p class=" my-card-timer">Timer</p>
                <p class="text-danger fnt-m m-0 my-card-value">100.00€</p>
                <a href="/auction" class="my-card-bid-btn btn btn-dark">Licitar</a>
            </div>
        </div>
        <div class="my-card">
            <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
            <div class="my-card-sub">
                <h5 class="my-card-title ">Titulo xyz xpto assim assado asdjaskldjlka sjdlkasj lkajd
                    lkjaslkdj lk</h5>
                <p class=" my-card-timer">Timer</p>
                <p class="text-danger fnt-m m-0 my-card-value">100.00€</p>
                <a href="/auction" class="my-card-bid-btn btn btn-dark">Licitar</a>
            </div>
        </div>
        <div class="my-card">
            <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
            <div class="my-card-sub">
                <h5 class="my-card-title ">Titulo xyz xpto assim assado asdjaskldjlka sjdlkasj lkajd
                    lkjaslkdj lk</h5>
                <p class=" my-card-timer">Timer</p>
                <p class="text-danger fnt-m m-0 my-card-value">100.00€</p>
                <a href="/auction" class="my-card-bid-btn btn btn-dark">Licitar</a>
            </div>
        </div>
        <div class="my-card card-bundle">
            <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
            <div class="my-card-sub">
                <h5 class="my-card-title ">Titulo xyz xpto assim assado asdjaskldjlka sjdlkasj lkajd
                    lkjaslkdj lk</h5>
                <p class=" my-card-timer">Timer</p>
                <p class="text-danger fnt-m m-0 my-card-value">100.00€</p>
                <a href="/auction" class="my-card-bid-btn btn btn-dark">Licitar</a>
            </div>
        </div>
        <div class="my-card">
            <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
            <div class="my-card-sub">
                <h5 class="my-card-title ">Titulo xyz xpto assim assado asdjaskldjlka sjdlkasj lkajd
                    lkjaslkdj lk</h5>
                <p class=" my-card-timer">Timer</p>
                <p class="text-danger fnt-m m-0 my-card-value">100.00€</p>
                <a href="/auction" class="my-card-bid-btn btn btn-dark">Licitar</a>
            </div>
        </div>
        <div class="my-card">
            <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
            <div class="my-card-sub">
                <h5 class="my-card-title ">Titulo xyz xpto assim assado asdjaskldjlka sjdlkasj lkajd
                    lkjaslkdj lk</h5>
                <p class=" my-card-timer">Timer</p>
                <p class="text-danger fnt-m m-0 my-card-value">100.00€</p>
                <a href="/auction" class="my-card-bid-btn btn btn-dark">Licitar</a>
            </div>
        </div>
        <div class="my-card card-bundle">
            <img src="{{asset('img/img-placeholder-224.png')}}" class="my-card-img" alt="..." />
            <div class="my-card-sub">
                <h5 class="my-card-title ">Titulo xyz xpto assim assado asdjaskldjlka sjdlkasj lkajd
                    lkjaslkdj lk</h5>
                <p class=" my-card-timer">Timer</p>
                <p class="text-danger fnt-m m-0 my-card-value">100.00€</p>
                <a href="/auction" class="my-card-bid-btn btn btn-dark">Licitar</a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content fnt-main cl-terciary">
                <div class="modal-header">
                    <h5 class="modal-title fnt-l" id="exampleModalLabel">
                        Login
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div id="login-modal-body" class="my-modal-body">
                    <div class="d-flex flex-column gap-1">
                        <p class="m-0 fnt-s ">E-mail</p>
                        <input type="email" class="form-control fnt-s " placeholder="email@email.com" />

                    </div>
                    <div class="d-flex flex-column gap-1">
                        <p class="m-0 fnt-s ">Password</p>
                        <input type="password" class="form-control fnt-s " placeholder="Palavra-Passe" />
                        <button
                            class="align-self-end p-0 border-0 bg-transparent primaryColor registar-sh fnt-s "
                            data-bs-toggle="modal" data-bs-target="#modalNovaPass">
                            Esqueceu-se da password?
                        </button>
                    </div>

                    <div class="modal-btn-container">
                        <button type="button" class="w-100 btn btn-dark bkg-terciary cl-primary btn-m fnt-l"
                            id="login-btn">
                            Login
                        </button>
                    </div>
                    <a class="" data-bs-toggle="modal" data-bs-target="#modalRegister">
                        Não tem conta? Criar conta!
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header fnt-main  cl-terciary">
                    <h5 class="modal-title fnt-l" id="exampleModalLabel">
                        Registar
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div id="register-acc-modal-body" class="my-modal-body">
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between gap-2">
                            <input type="text" class="form-control fnt-s" placeholder="Nome Próprio" />
                            <input type="text" class="form-control fnt-s" placeholder="Apelido" />
                        </div>
                        <input type="date" class="form-control w-50 fnt-s" placeholder="Data Nascimento"
                            value="" />
                        <div class="d-flex justify-content-between gap-2">
                            <input type="text" class="form-control w-75 fnt-s" placeholder="Morada" />
                            <input type="text" class="form-control w-25 fnt-s" placeholder="Cód Postal" />
                        </div>
                        <div class="d-flex justify-content-between gap-2">
                            <input type="text" class="form-control fnt-s" placeholder="Cidade" />
                            <input type="text" class="form-control fnt-s" placeholder="País" />
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2 ">
                        <input type="email" class="form-control fnt-s" placeholder="Email" />
                        <div class="d-flex justify-content-between gap-2">
                            <input type="password" class="form-control fnt-s" placeholder="Palavra-Passe" />
                            <input type="password" class="form-control fnt-s"
                                placeholder="Confirmar Palavra-Passe" />
                        </div>
                    </div>
                    <div class="d-flex justify-content-between gap-2 ">
                        <input type="text" class="form-control fnt-s" placeholder="NIF" />
                        <input type="text" class="form-control fnt-s" placeholder="IBAN" />
                    </div>
                    <div class="modal-btn-container">
                        <button class="form-control btn btn-light bkg-primary cl-terciary"
                            data-bs-toggle="modal" data-bs-target="#modalLogin">
                            Cancelar
                        </button>
                        <button class="form-control btn btn-dark bkg-terciary cl-primary">
                            Confirmar
                        </button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modalNovaPass" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content fnt-main">
                <div class="modal-header cl-terciary">
                    <h5 class="modal-title fnt-l" id="exampleModalLabel">
                        Recuperar Password
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="d-flex flex-column gap-4 p-5">
                    <input type="text" class="form-control fnt-s" placeholder="Introduza o seu e-mail" />
                    <div class="d-flex flex-column gap-2">
                        <button class="form-control btn btn-dark bkg-terciary cl-primary fnt-s">
                            Confirmar
                        </button>
                        <button class="form-control btn btn-light bkg-primary cl-terciary fnt-s"
                            data-bs-toggle="modal" data-bs-target="#modalLogin">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials/footer')