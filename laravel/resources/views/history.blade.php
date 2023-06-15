@include('partials/head')
@include('partials/nav')
<div id="history-main-container" class="main-container">
    @include('partials/profileSideNavigation')
    <section class="history-section">
        <table class="history-table">
            <caption id="historyTitle">
                Histórico de {{ $heading }}
            </caption>
            <tr>
                <th></th>
                <th></th>
                <th><i class="fa-solid fa-dollar-sign"></th>
                <th><i class="fa-regular fa-calendar"></th>
                <th><i class="fa-regular fa-file"></th>
            </tr>
            @foreach ($articles as $article)
            <tr>
                <td data-cell="img">
                    <img src="..\img\img-placeholder-48.png" alt="">
                </td>
                <td data-cell="name">{{$article->nome}}</td>
                <td data-cell="price">{{$article->preco}}€</td>
                <td data-cell="date">{{$article->data ?? 'N/A'}}</td>
                <td data-cell="file">
                    <i class="fa-solid fa-square"></i>
                </td>
            </tr>
            @endforeach 
{{-- 


            <tr>
                <th></th>
                <th></th>
                <th><i class="fa-solid fa-dollar-sign"></th>
                <th><i class="fa-regular fa-calendar"></th>
                <th><i class="fa-regular fa-file"></th>
            </tr>

            <tr>
                <td data-cell="img">
                    <img src="..\img\img-placeholder-48.png" alt="">
                </td>
                <td data-cell="name">artigo</td>
                <td data-cell="price">000000€</td>
                <td data-cell="date">9999-99-99</td>
                <td data-cell="file">
                    <i class="fa-solid fa-square"></i>
                </td>
            </tr>
            <tr>
                <td data-cell="img">
                    <img src="..\img\img-placeholder-48.png" alt="">
                </td>
                <td data-cell="name">artigo</td>
                <td data-cell="price">000000€</td>
                <td data-cell="date">9999-99-99</td>
                <td data-cell="file">
                    <i class="fa-regular fa-square"></i>
                </td>
            </tr>
            <tr>
                <td data-cell="img">
                    <img src="..\img\img-placeholder-48.png" alt="">
                </td>
                <td data-cell="name">artigo</td>
                <td data-cell="price">000000€</td>
                <td data-cell="date">9999-99-99</td>
                <td data-cell="file">
                    <i class="fa-solid fa-square"></i>
                </td>
            </tr>
            <tr>
                <td data-cell="img">
                    <img src="..\img\img-placeholder-48.png" alt="">
                </td>
                <td data-cell="name">artigo</td>
                <td data-cell="price">000000€</td>
                <td data-cell="date">9999-99-99</td>
                <td data-cell="file">
                    <i class="fa-regular fa-square"></i>
                </td>
            </tr>
            <tr>
                <td data-cell="img">
                    <img src="..\img\img-placeholder-48.png" alt="">
                </td>
                <td data-cell="name">artigo</td>
                <td data-cell="price">000000€</td>
                <td data-cell="date">9999-99-99</td>
                <td data-cell="file">
                    <i class="fa-solid fa-square"></i>
                </td>
            </tr> --}}
        </table>
    </section>
</div>


@include('partials/footer')

<script src="{{ asset('js/navbar.js') }}" defer></script>
<script src="{{ asset('js/historypage.js') }}" defer></script>

</body>
</html>