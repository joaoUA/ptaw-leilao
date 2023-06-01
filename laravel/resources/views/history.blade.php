@include('partials/head')
@include('partials/nav')
<div id="history-main-container" class="main-container">
    @include('partials/profileSideNavigation')
    <section class="history-section">
        <table class="history-table">
            <caption>
                Histórico de ...
            </caption>
            <tr>
                <th></th>
                <th></th>
                <th><i class="fa-solid fa-dollar-sign"></th>
                <th><i class="fa-regular fa-calendar"></th>
                <th><i class="fa-regular fa-file"></th>
            </tr>

            <tr>
                <td data-cell="img">
                    <img src=".\img\img-placeholder-48.png" alt="">
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
                    <img src=".\img\img-placeholder-48.png" alt="">
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
                    <img src=".\img\img-placeholder-48.png" alt="">
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
                    <img src=".\img\img-placeholder-48.png" alt="">
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
                    <img src=".\img\img-placeholder-48.png" alt="">
                </td>
                <td data-cell="name">artigo</td>
                <td data-cell="price">000000€</td>
                <td data-cell="date">9999-99-99</td>
                <td data-cell="file">
                    <i class="fa-solid fa-square"></i>
                </td>
            </tr>
        </table>
    </section>
</div>
@include('partials/footer')