<header class="bkg-secondary fnt-main">
    <div class="search-container">
        <div id="search-icon" class="icon-container">
            <i class="fa fa-search"></i>
        </div>
        <form id="search-bar" action="" class="hidden" role="search">
            <input type="search" name="" id="" class="form-control me-2" placeholder="Pesquisar..." />
            <button type="submit" class="form-control btn btn-light fnt-s border-0">Pesquisar</button>
        </form>
    </div>
    <nav>
        <a href="/">Início</a>
    </nav>
    <div id="profile-link-container">
        <div id="profile-icon-container" class=" fnt-xl">
            <button class="btn btn-light btn-sm cl-terciary" data-bs-toggle="modal"
                data-bs-target="#modalLogin">Login</button>
            <i id="profile-icon" href="./perfilDados.html" class="bi bi-person-circle text-light"></i>
        </div>
        <ul id="profile-menu" class="hidden">
            <a href="/profile">Perfil</a>
            <a href="/new">Criar Leilão</a>
            <a href="/verification">Painel Admin</a>
        </ul>
    </div>
</div>

<!--MODAL LOGIN-->
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
                    <button type="button" id="btn-login" class="w-100 btn btn-dark bkg-terciary cl-primary btn-m fnt-l">
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

<!--MODAL REGISTAR CONTA-->
<div class="modal fade" id="modalRegister" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header fnt-main  cl-terciary">
                <h5 class="modal-title fnt-l" id="exampleModalLabel">
                    Registar
                </h5>
                <button id="btn-close-register-modal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div id="register-acc-modal-body" class="my-modal-body">
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between gap-2">
                        <input type="text" id="input-register-first-name" class="form-control fnt-s" placeholder="Nome Próprio" required/>
                        <input type="text" id="input-register-surname" class="form-control fnt-s" placeholder="Apelido" required/>
                    </div>
                    <input type="date" id="input-register-birthday" class="form-control w-50 fnt-s" placeholder="Data Nascimento"
                        value="" required/>
                    <div class="d-flex justify-content-between gap-2">
                        <input type="text" id="input-register-address" class="form-control w-75 fnt-s" placeholder="Morada" required/>
                        <input type="text" id="input-register-post-code" class="form-control w-25 fnt-s" placeholder="Cód Postal" required/>
                    </div>
                    <div class="d-flex justify-content-between gap-2">
                        <input type="text" id="input-register-city" class="form-control fnt-s" placeholder="Cidade" required/>
                        <input type="text" id="input-register-country" class="form-control fnt-s" placeholder="País" required/>
                    </div>
                </div>
                <div class="d-flex flex-column gap-2 ">
                    <input type="email" id="input-register-email" class="form-control fnt-s" placeholder="Email" required/>
                    <div class="d-flex justify-content-between gap-2">
                        <input type="password" id="input-register-password" class="form-control fnt-s" placeholder="Palavra-Passe" required/>
                        <input type="password" id="input-register-confirm-password" class="form-control fnt-s"
                            placeholder="Confirmar Palavra-Passe" required/>
                    </div>
                </div>
                <div class="d-flex justify-content-between gap-2 ">
                    <input type="text" id="input-register-nif" class="form-control fnt-s" placeholder="NIF" required />
                    <input type="text" id="input-register-iban" class="form-control fnt-s" placeholder="IBAN" required/>
                </div>
                <div class="modal-btn-container">
                    <button type="button" class="form-control btn btn-light bkg-primary cl-terciary"
                        data-bs-toggle="modal" data-bs-target="#modalLogin">
                        Cancelar
                    </button>
                    <button type="button" id="btn-confirm-register-account" class="form-control btn btn-dark bkg-terciary cl-primary">
                        Confirmar
                    </button>
                </div>
            </div>

        </div>
    </div>
</div>

<!--MODAL RECUPERAR PASSWORD-->
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

</header>
<main>