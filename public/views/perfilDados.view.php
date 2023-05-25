<?php require('partials/head.php')?>
<?php require('partials/header.php')?>

<div id="profile-main-container" class="main-container">
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
    <section id="profile">
        <h3 class="fnt-xl">Perfil</h3>
        <div>
            <div class="d-flex flex-column gap-2">
                <div class="d-flex justify-content-between gap-2">
                    <input type="text" class="form-control" placeholder="Nome Próprio">
                    <input type="text" class="form-control" placeholder="Apelido">
                </div>
                <input type="date" class="form-control w-50" placeholder="Data Nascimento" value="">
                <div class="d-flex justify-content-between gap-2">
                    <input type="text" class="form-control w-75" placeholder="Morada">
                    <input type="text" class="form-control w-25" placeholder="Código Postal">
                </div>
                <div class="d-flex justify-content-between gap-2">
                    <input type="text" class="form-control" placeholder="Cidade">
                    <input type="text" class="form-control" placeholder="País">
                </div>
            </div>
            <div class="d-flex flex-column gap-2">
                <input type="email" class="form-control" placeholder="Email">
                <div class="d-flex justify-content-between gap-2">
                    <input type="password" class="form-control" placeholder="Palavra-Passe">
                    <input type="password" class="form-control" placeholder="Confirmar Palavra-Passe">
                </div>
            </div>
            <div class="d-flex justify-content-between gap-2">
                <input type="text" class="form-control" placeholder="CC">
                <input type="text" class="form-control" placeholder="IBAN">
            </div>
            <div class="d-flex justify-content-between gap-2">
                <button class="form-control btn btn-light bkg-primary cl-terciary">Cancelar</button>
                <button class="form-control btn btn-dark bkg-terciary cl-primary border-0">Confirmar</button>
            </div>
        </div>
    </section>
</div>

<?php require('partials/footer.php')?>