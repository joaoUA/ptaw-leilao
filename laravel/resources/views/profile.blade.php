@include('partials/head')
@include('partials/nav')

<div id="profile-main-container" class="main-container">
    @include('partials/profileSideNavigation')
    <div id="profile">
        <h2>Perfil</h2>
        <div id="profile-roles">
            <h3>Cargos</h3>
            <div id="roles-container">
                <div class="role-item">
                    <p class="role-name">Vendedor</p>
                    <button class="btn-request-role">Pedir</button>
                </div>
                <div class="role-item">
                    <p class="role-name">Administrador</p>
                    <button class="btn-request-role">Atribuído</button>
                </div>
            </div>

        </div>
        
        
        <div id="profile-data">
            <h3 class="fnt-xl">Dados</h3>
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
                <button id="btn-confirm-profile-changes" class="form-control btn btn-dark bkg-terciary cl-primary border-0">Confirmar</button>
            </div>
        </div>
    </div>
</div>

@include('partials/footer')