@include('partials/head')
@include('partials/nav')

<div id="profile-main-container" class="main-container">
    @include('partials/profileSideNavigation')
    <section id="profile">
        <h3 class="fnt-xl">Perfil</h3>

        @if (Auth::check())
            <div>
                @php
                    $user = Auth::user();
                @endphp
                <div class="d-flex flex-column gap-2">
                    <!-- todo -->
                    <!-- separar nome na base de dados entre 'nome' e 'apelido'-->
                    <div class="d-flex justify-content-between gap-2">
                        <input type="text" id="input-profile-first-name" class="form-control" placeholder="Nome Próprio" value="{{$user->nome}}">
                        <input type="text" id="input-profile-surname" class="form-control" placeholder="Apelido">
                    </div>
                    <input type="date" id="input-profile-birthday" class="form-control w-50" placeholder="Data Nascimento" value="{{$user->data_nascimento->format('Y-m-d')}}">
                    <div class="d-flex justify-content-between gap-2">
                        <input type="text" id="input-profile-address" class="form-control w-75" placeholder="Morada" value="{{$user->morada}}">
                        <input type="text" id="input-profile-postcode" class="form-control w-25" placeholder="Código Postal" value="{{$user->codigo_postal}}">
                    </div>
                    <div class="d-flex justify-content-between gap-2">
                        <input type="text" id="input-profile-city" class="form-control" placeholder="Cidade" value="{{$user->cidade}}">
                        <input type="text" id="input-profile-country" class="form-control" placeholder="País" value="{{$user->pais}}">
                    </div>
                </div>
                <div class="d-flex flex-column gap-2">
                    <input type="email" id="input-profile-email" class="form-control" placeholder="Email" value="{{$user->email}}">
                    <div class="d-flex justify-content-between gap-2">
                        <input type="password" class="form-control" placeholder="Palavra-Passe">
                        <input type="password" class="form-control" placeholder="Confirmar Palavra-Passe">
                    </div>
                </div>
                <div class="d-flex justify-content-between gap-2">
                    <input type="text" id="input-profile-nif" class="form-control" placeholder="NIF" value="{{$user->nif}}">
                    <input type="text" id="input-profile-iban" class="form-control" placeholder="IBAN" value="{{$user->iban}}">
                </div>
                <div class="d-flex justify-content-between gap-2">
                    <!-- todo : remover botão 'cancel', não faz sentido porque o utilizador tem de confirmar as alterações
                        se alterar tudo e depois não carregar no confirmar e sair da página é como se cancelasse
                    -->
                    <button class="form-control btn btn-light bkg-primary cl-terciary">Cancelar</button>
                    <button id="btn-confirm-profile-changes" class="form-control btn btn-dark bkg-terciary cl-primary border-0">Confirmar</button>
                </div>
            </div>
        @endif
    </section>
</div>

@include('partials/footer')