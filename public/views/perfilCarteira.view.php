<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--Bootstrap CSS Link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <!--Bootstrap JS Link (Defer)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"
        defer></script>
    <!--Bootstrap Icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" />
    <title>Carteira</title>
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./js/main.js" defer></script>
    <script src="https://kit.fontawesome.com/25b734335a.js" crossorigin="anonymous"></script>
</head>

<body>
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
            <a href="./index.html">Início</a>
        </nav>
        <div id="profile-link-container">
            <div id="profile-icon-container" class=" fnt-xl">
                <button class="btn btn-light btn-sm cl-terciary" data-bs-toggle="modal"
                    data-bs-target="#modalLogin">Login</button>
                <i id="profile-icon" href="./perfilDados.html" class="bi bi-person-circle text-light"></i>
            </div>
            <ul id="profile-menu" class="hidden">
                <a href="./perfilDados.html">Perfil</a>
                <a href="./criarLeilao.html">Criar Leilão</a>
                <a href="./verificacao.html">Painel Admin</a>
            </ul>
        </div>
    </header>
    <main>
        <div id="wallet-main-container" class="main-container">
            <aside class="sidebar-container">
                <a href="./perfilDados.html" class="sidebar-item">Dados
                    Pessoais</a>
                <a href="./historico.html" class="sidebar-item">Histórico
                    de Compras</a>
                <a href="./historico.html" class="sidebar-item">Histórico
                    de Vendas</a>
                <a href="./perfilCarteira.html" class="sidebar-item">Carteira</a>
                <a href="#" class="sidebar-item">Sair</a>
            </aside>
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

    </main>
    <footer class="bkg-primary">
        <ul class="fnt-main">
            <li class="nav-item">
                <a href="#">Entregas e Devoluções</a>
            </li>
            <li class="nav-item">
                <a href="#">Termos e Condições</a>
            </li>
            <li class="nav-item">
                <a href="#">Política de Cookies</a>
            </li>
            <li class="nav-item">
                <a href="#">FAQ</a>
            </li>
            <li class="nav-item">
                <a href="#">Sobre</a>
            </li>
            <li class="nav-item">
                <a href="#">Contacto</a>
            </li>
        </ul>
    </footer>
</body>

</html>