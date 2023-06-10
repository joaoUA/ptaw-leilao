const loginBtn = document.getElementById("login-btn")
const licitarBtns = Array.from(document.querySelectorAll(".my-card-sub > a"))
const searchIcon = document.getElementById("search-icon");
const profileIcon = document.getElementById("profile-icon");

const btnNewAuctionItem = document.getElementById("btn-confirm-new-auction-item");
const btnSubmitNewAuction = document.getElementById("btn-submit-new-auction");

const searchBar = document.getElementById("search-bar")
const profileMenu = document.getElementById("profile-menu");

const auctionItems = [];
let currentItemId = 0;

loginBtn?.addEventListener("click", () => {
    window.location.href = "./perfilDados.html";
})

licitarBtns?.forEach(btn => {
    btn.addEventListener("click", () => {
        window.location.href = "./leilao.html"
    })
});

searchIcon?.addEventListener('click', () => {
    searchBar?.classList.toggle('hidden');
});

profileIcon?.addEventListener('click', () => {
    profileMenu?.classList.toggle('hidden')
});

btnNewAuctionItem.addEventListener('click', () => {
    const itemInputName = document.getElementById("artigo-nome");
    const itemInputPrice = document.getElementById("artigo-preco");
    const itemInputCategory = document.getElementById("artigo-categoria");
    const itemName = itemInputName.value.trim();
    const itemPrice = itemInputPrice.value;
    const itemCategory = itemInputCategory.value;


    if (itemName == "" || itemPrice == "" || itemCategory == "") {
        alert("Preencha todos os campos");
        return;
    }
    auctionItems.push({
        id: currentItemId,
        //Peça Leilao:
        precoInicial: itemPrice,
        //Peça Arte:
        nome: itemName,
        artista: null,
        ano: null,
        categoria: itemCategory
    })

    const tr = document.createElement('tr');
    const th = document.createElement('th');
    th.setAttribute('scope', 'row');
    th.className = 'fnt-s';
    th.setAttribute('data-id', currentItemId);
    th.textContent = ' ';
    currentItemId++;

    const tdIcon = document.createElement('td');
    const icon = document.createElement('i');
    icon.className = 'bi bi-card-image';
    tdIcon.appendChild(icon);

    const tdName = document.createElement('td');
    tdName.className = 'fnt-s';
    tdName.textContent = itemName;

    const tdPrice = document.createElement('td');
    tdPrice.className = 'fnt-s';
    tdPrice.textContent = `${itemPrice}€`;

    const tdCategory = document.createElement('td');
    const iconCategory = document.createElement('i');
    iconCategory.className = 'bi bi-brush-fill';
    tdCategory.appendChild(iconCategory);

    const tdAuthentication = document.createElement('td');
    const authIcon = document.createElement('i');
    authIcon.className = 'bi bi-check-square';
    tdAuthentication.appendChild(authIcon);

    tr.appendChild(th);
    tr.appendChild(tdIcon);
    tr.appendChild(tdName);
    tr.appendChild(tdPrice);
    tr.appendChild(tdCategory);
    tr.appendChild(tdAuthentication);

    const tableBody = document.getElementsByTagName("tbody")[0];
    tableBody.appendChild(tr);

    itemInputName.value = "";
    itemInputPrice.value = "";
    itemInputCategory.selectedIndex = 0;
    document.getElementById('btn-cancel-new-auction').click();
});

btnSubmitNewAuction.addEventListener('click', () => {
    const auctionName = document.getElementById("input-leilao-nome").value.trim();

    const auction = {
        name: auctionName,
        collection: false,
        items: auctionItems,
    };

    fetch("/api/auction", {
        method: "POST",
        headers: { "Content-Type": "aplication/json" },
        body: JSON.stringify(auction),
    }).then(response => {
        if (response.ok) {
            return response.json();
        } else {
            throw new Error("Request failed with status " + response.status);
        }
    }).then(data => {
        alert(data['message']);
        location.reload();
    }).catch(error => {
        console.error(error);
    });
});