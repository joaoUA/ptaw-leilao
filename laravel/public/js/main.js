const licitarBtns = Array.from(
    document.querySelectorAll(".my-card-sub > button")
);
const searchIcon = document.getElementById("search-icon");
const profileIcon = document.getElementById("profile-icon");

const btnNewAuctionItem = document.getElementById(
    "btn-confirm-new-auction-item"
);
const btnSubmitNewAuction = document.getElementById("btn-submit-new-auction");
const btnNewAuctionCollection = document.getElementById("flexSwitchCheckDefault");
const NewAuctionCollectionPrice = document.getElementById("collectionPrice");

const searchBar = document.getElementById("search-bar");
const profileMenu = document.getElementById("profile-menu");

//REGISTAR MODAL
const btnRegisterAccount = document.getElementById(
    "btn-confirm-register-account"
);
const btnLogin = document.getElementById("btn-login");
const btnLogout = document.getElementById("btn-logout");

//PERFIL
const btnConfirmProfileChanges = document.getElementById(
    "btn-confirm-profile-changes"
);
const auctionItems = [];
let currentItemId = 0;

//CARTEIRA
const btnConfirmCard = document.getElementById("btn-confirm-card");
const btnDeleteCard = document.getElementById("btn-delete-card");
//LICITAR
const btnBid = document.getElementById('btn-bid');
const bidInputField = document.getElementById('bid-input-field');
//PEDIR MUDANÇA DE CARGO
const btnRequestSellerStatus = document.getElementById("btn-request-seller-status");
const btnRequestAdminStatus = document.getElementById("btn-request-admin-status");

//ITEMS DA TABELA DE VERIFICAÇÃO
const userVerificationItems = document.getElementById('seller-vt') ? Array.from(document.getElementById('seller-vt').getElementsByClassName('vt-item')) : null;
const auctionVerificationItems = document.getElementById('auction-vt') ? Array.from(document.getElementById('auction-vt').getElementsByClassName('vt-item')) : null;
const btnConfirmRoleChangeRequest = document.getElementById('btn-user-modal-confirm-request');
const btnRejectRoleChangeRequest = document.getElementById('btn-user-modal-reject-request');
const btnConfirmAuctionVerification = document.getElementById('btn-auction-modal-confirm-request');
const btnRejectAuctionVerification = document.getElementById('btn-auction-modal-reject-request');

//remover da lista o primeir div que é o titulo
auctionVerificationItems?.shift();
userVerificationItems?.shift();



//licitarBtns.forEach(btn => {})

searchIcon?.addEventListener("click", () => {
    searchBar?.classList.toggle("hidden");
});

profileIcon?.addEventListener("click", () => {
    profileMenu?.classList.toggle("hidden");
});

btnNewAuctionItem?.addEventListener("click", () => {
    const itemInputName = document.getElementById("artigo-nome");
    const itemInputArtist = document.getElementById("artigo-artista");
    const itemInputYear = document.getElementById("artigo-ano");
    const itemInputPrice = document.getElementById("artigo-preco");
    const itemInputCategory = document.getElementById("artigo-categoria");

    const itemArtist = itemInputArtist.value.trim();
    const itemYear = itemInputYear.value.trim();
    const itemName = itemInputName.value.trim();
    const itemPrice = itemInputPrice.value;
    const itemCategory = itemInputCategory.value;

    if (itemName == "" || itemPrice == "" || itemCategory == "") {
        alert("Preencha todos os campos");
        return;
    } else if (itemPrice <= 0) {
        alert("Insira um valor positivo.");
        return;
    }
    auctionItems.push({
        id: currentItemId,
        //Peça Leilao:
        precoInicial: itemPrice,
        //Peça Arte:
        nome: itemName,
        artista:itemArtist,
        ano:itemYear,
        categoria: itemCategory
    });

    const tr = document.createElement("tr");
    const th = document.createElement("th");
    th.setAttribute("scope", "row");
    th.className = "fnt-s";
    th.setAttribute("data-id", currentItemId);
    th.textContent = " ";
    currentItemId++;

    const tdIcon = document.createElement("td");
    const icon = document.createElement("i");
    icon.className = "bi bi-card-image";
    tdIcon.appendChild(icon);

    const tdName = document.createElement("td");
    tdName.className = "fnt-s";
    tdName.textContent = itemName;

    const tdPrice = document.createElement("td");
    tdPrice.className = "fnt-s";
    tdPrice.textContent = `${itemPrice}€`;

    const tdCategory = document.createElement("td");
    const iconCategory = document.createElement("i");
    iconCategory.className = "bi bi-brush-fill";
    tdCategory.appendChild(iconCategory);

    const tdAuthentication = document.createElement("td");
    const authIcon = document.createElement("i");
    authIcon.className = "bi bi-check-square";
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

    if (auctionItems.length > 1) {
        btnNewAuctionCollection.disabled = false;
    }

    document.getElementById("btn-cancel-new-auction").click();
});


btnNewAuctionCollection?.addEventListener('click', () => {
    if (btnNewAuctionCollection.checked) {
        NewAuctionCollectionPrice.disabled = false;
    } else {
        NewAuctionCollectionPrice.disabled = true;
        NewAuctionCollectionPrice.value = "";
    }
});

btnSubmitNewAuction?.addEventListener('click', async () => {
    const auctionName = document.getElementById("input-leilao-nome").value.trim();
    const collection = btnNewAuctionCollection.checked;
    let collectionPrice = 0;

    if (collection) {
        collectionPrice = NewAuctionCollectionPrice.value;
    }

    const auction = {
        name: auctionName,
        collection: collection,
        collectionPrice: collectionPrice,
        items: auctionItems,
    };

    let responseMessage;

    try {
        const response = await fetch("/api/auction", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(auction),
        });

        const data = await response.json();
        responseMessage = data['message'];

        if (!response.ok)
            throw new Error(`${response.status}: ${responseMessage}`);
        console.log(responseMessage)
        location.reload();

    } catch (error) {
        console.log(responseMessage);
    }
});

btnRegisterAccount?.addEventListener("click", () => {
    //#region Input Elements
    const inputFirstname = document.getElementById("input-register-first-name");
    const inputSurname = document.getElementById("input-register-surname");
    const inputBirthday = document.getElementById("input-register-birthday");
    const inputAddress = document.getElementById("input-register-address");
    const inputPostcode = document.getElementById("input-register-post-code");
    const inputCity = document.getElementById("input-register-city");
    const inputCountry = document.getElementById("input-register-country");
    const inputEmail = document.getElementById("input-register-email");
    const inputPassword = document.getElementById("input-register-password");
    const inputConfirmPassword = document.getElementById(
        "input-register-confirm-password"
    );
    const inputNif = document.getElementById("input-register-nif");
    const inputIban = document.getElementById("input-register-iban");
    //#endregion

    //#region Input Values
    const firstName = inputFirstname.value.trim();
    const surname = inputSurname.value.trim();
    const birthday = inputBirthday.value;
    const address = inputAddress.value.trim();
    const postcode = inputPostcode.value.trim();
    const city = inputCity.value.trim();
    const country = inputCountry.value.trim();
    const email = inputEmail.value;
    const password = inputPassword.value;
    const confirmPassword = inputConfirmPassword.value;
    const nif = parseInt(inputNif.value);
    const iban = inputIban.value.trim();
    //#endregion

    if (password != confirmPassword) return;

    const account = {
        id: 5,
        name: `${firstName} ${surname}`,
        birthday: birthday,
        address: address,
        postcode: postcode,
        city: city,
        country: country,
        email: email,
        password: password,
        nif: nif,
        iban: iban,
    };

    fetch("/api/register", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify(account),
    })
        .then((response) => {
            if (response.ok) {
                return response.json();
            } else throw new Error(`Erro: ${response.status}`);
        })
        .then((data) => {
            alert(data["message"]);

            location.reload();
        })
        .catch((error) => console.log(error));
});

btnLogin?.addEventListener("click", () => {
    const inputEmail = document.getElementById("input-login-email");
    const inputPassword = document.getElementById("input-login-password");

    const email = inputEmail.value.trim();
    const password = inputPassword.value;

    const credentials = {
        email: email,
        password: password,
    };

    fetch("/api/login", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: JSON.stringify(credentials),
    })
        .then((response) => {
            if (response.ok) return response.json();
            else throw new Error(`Erro: ${response.status}`);
        })
        .then((data) => {
            alert(data["message"]);
            location.reload();
        })
        .catch((error) => console.error(error));
});

btnLogout?.addEventListener("click", (event) => {
    event.preventDefault();

    fetch("/api/logout", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
        },
        body: "",
    })
        .then((response) => {
            if (response.redirected) {
                window.location.href = response.url;
            } else {
                if (response.ok) {
                    console.log("Logout successful");
                } else {
                    console.error("Logout failed");
                }
            }
        })
        .catch((error) => console.log(error));
});

btnConfirmCard?.addEventListener("click", async () => {
    //#region Input Elements
    const inputCardName = document.getElementById("input-card-name");
    const inputCardNumber = document.getElementById("input-card-number");
    const inputCardMonth = document.getElementById("input-card-month");
    const inputCardYear = document.getElementById("input-card-year");
    const inputCardCvc = document.getElementById("input-card-cvc");
    const userId = btnConfirmCard.getAttribute("data-user-id");
    //#endregion

    //#region Input Values
    const CardName = inputCardName.value.trim();
    const CardNumber = inputCardNumber.value.trim();
    const CardMonth = inputCardMonth.value.trim();
    const CardYear = inputCardYear.value.trim();
    const CardCvc = inputCardCvc.value.trim();
    //#endregion

    const card = {
        id: CardNumber,
        nome: CardName,
        mes: CardMonth,
        ano: CardYear,
        cvc: CardCvc,
        utilizador_id: userId,
    };
    console.log(card);
    let responseMessage;

    try {
        const response = await fetch("/api/card", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(card),
        });

        const data = await response.json();

        responseMessage = data["message"];

        if (!response.ok)
            throw new Error(`Erro: ${response.status}`);

        alert(responseMessage);
        location.reload();
    } catch (error) {
        console.log(responseMessage);
    }
});

btnDeleteCard?.addEventListener("click", async () => {
    const userId = btnDeleteCard.getAttribute("data-user-id");

    try {
        const response = await fetch(`/api/card/${userId}`, {
            method: "DELETE",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({}),
        });

        const data = await response.json();

        responseMessage = data["message"];

        if (!response.ok) throw new Error(`Erro: ${response.status}`);

        alert(responseMessage);
        location.reload();
    } catch (error) {
        console.log(responseMessage);
    }
});
btnConfirmProfileChanges?.addEventListener('click', () => {

})

btnBid?.addEventListener('click', async () => {
    const auctionId = btnBid.getAttribute('data-auction-id');
    const auctionItemId = btnBid.getAttribute('data-auction-item-id');
    const userId = btnBid.getAttribute('data-user-id');

    let bid = bidInputField.value;
    if (bid == '')
        return;
    bid = parseInt(bid);

    bidInputField.value = null;

    try {
        const response = await fetch('/api/bid', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            }, body: JSON.stringify({
                auctionId: auctionId,
                auctionItemId: auctionItemId,
                bid: bid,
                userId: userId
            })
        });
        const data = await response.json();
        if (!response.ok) {
            const errorMessage = data['message'];
            throw new Error(`${response.status}: ${errorMessage}`);
        }
        const successMessage = data['message'];
        console.log(successMessage);

    } catch (error) {
        console.error(error);
    }
});

btnRequestSellerStatus?.addEventListener('click', () => {
    const userId = btnRequestSellerStatus.getAttribute('data-user-id')
    fetch(`/api/role-change/${userId}/seller`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({}),
    })
        .then(response => {
            if (response.ok) {
                window.location.reload();
                return response.json();
            }
            else
                throw new Error(`Erro: ${response.status}`)
        })
        .catch(error => console.error(error));
});

btnRequestAdminStatus?.addEventListener('click', () => {
    const userId = btnRequestAdminStatus.getAttribute('data-user-id');
    fetch(`/api/role-change/${userId}/admin`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({}),
    })
        .then(response => {
            if (response.ok) {
                //window.location.reload();
                return;
            }
            else
                throw new Error(`Erro: ${response.status}`);
        })
        .catch(error => console.log(error));
})

userVerificationItems?.forEach(element => {
    element.addEventListener('click', async () => {
        const requestId = element.getAttribute('data-request-id');
        try {
            let response = await fetch(`/api/role-request/${requestId}`);
            const roleChange = await response.json();

            response = await fetch(`/api/user/${roleChange.utilizador_id}`);
            const user = await response.json();

            const sellerName = document.getElementById('modal-seller-name');
            const sellerBirthday = document.getElementById('modal-seller-birthday');
            const sellerAddress = document.getElementById('modal-seller-address');
            const sellerEmail = document.getElementById('modal-seller-email');
            const sellerNif = document.getElementById('modal-seller-nif');
            const sellerIban = document.getElementById('modal-seller-iban');

            sellerName.innerText = user['nome'];
            sellerBirthday.innerText = user['data_nascimento'].substring(0, 10);
            sellerAddress.innerText = user['morada'];
            sellerEmail.innerText = user['email'];
            sellerNif.innerText = user['nif'];
            sellerIban.innerText = user['iban'];

            const modal = document.getElementById('modal-seller');
            modal.setAttribute('data-request-id', requestId);

        } catch (error) {
            console.error(error);
        }
    });
})

auctionVerificationItems?.forEach(element => {
    element.addEventListener('click', async () => {
        const auctionId = element.getAttribute('data-auction-id');
        try {
            let response = await fetch(`api/auction/${auctionId}`);
            const data = await response.json();
            const auction = data['auction'];

            if (auction == null || Object.keys(auction).length === 0)
                throw Error("Leilão Vazio!");

            console.log(auction);

            const modalBody = document.getElementById('modal-al');
            modalBody.setAttribute('data-auction-id', auction[0]['leilao_id']);

            const auctionTitle = document.getElementById('modal-auction-name');
            const auctionSeller = document.getElementById('modal-auction-seller');

            auctionTitle.innerText = auction[0]['descricao'];
            auctionSeller.innerText = auction[0]['vendedor_nome'];

            document.querySelectorAll('.modal-auction-item').forEach(element => element.remove());

            Object.values(auction).forEach(auctionItem => {

                console.log(auctionItem);
                const modalAuctionItemDiv = document.createElement('div');
                modalAuctionItemDiv.classList.add('modal-auction-item');
                modalAuctionItemDiv.setAttribute('data-auction-item-id', auctionItem['peca_leilao_id']);

                const imageElement = document.createElement('img');
                imageElement.id = 'modal-article-image';
                imageElement.src = './img/img-placeholder-48.png';
                imageElement.alt = 'placeholder';
                imageElement.setAttribute('data-bs-toggle', 'modal');
                imageElement.setAttribute('data-bs-target', '#ModalArtigo');

                const paragraphElement = document.createElement('p');
                paragraphElement.innerText = auctionItem['peca_arte_nome'];

                const formCheckDiv = document.createElement('div');
                formCheckDiv.classList.add('form-check', 'form-switch');

                const inputElement = document.createElement('input');
                inputElement.type = 'checkbox';
                inputElement.classList.add('toggle-pill', 'form-check-input');
                inputElement.setAttribute('role', 'switch');


                imageElement.addEventListener('click', () => {
                    const modalArticleName = document.getElementById('modal-auction-item-name');
                    const modalArticleAuthor = document.getElementById('modal-auction-item-author');
                    const modalArticleYear = document.getElementById('modal-auction-item-year');
                    const modalArticleCategory = document.getElementById('modal-auction-item-category');
                    const modalArticlePrice = document.getElementById('modal-auction-item-price');

                    modalArticleName.innerText = `Nome: ${auctionItem['peca_arte_nome']}`;
                    modalArticleYear.innerText = `Data: ${auctionItem['ano'] || 'N/A'}`;
                    modalArticleAuthor.innerText = `Artista: ${auctionItem['artista'] || 'N/A'}`;
                    modalArticlePrice.innerText = `Preço Inicial: ${auctionItem['preco_inicial']}€`;
                    modalArticleCategory.innerText = `Categoria: ${auctionItem['categoria_nome']}`;
                });

                modalAuctionItemDiv.appendChild(imageElement);
                modalAuctionItemDiv.appendChild(paragraphElement);
                formCheckDiv.appendChild(inputElement);
                modalAuctionItemDiv.appendChild(formCheckDiv);

                const modalTitle = document.getElementById('modal-al-header');
                modalTitle.insertAdjacentElement('afterend', modalAuctionItemDiv);

            })
        } catch (error) {
            console.log(error);
        }
    });
})

btnConfirmRoleChangeRequest?.addEventListener('click', () => {
    const requestId = document.getElementById('modal-seller').getAttribute('data-request-id');

    fetch(`/api/role-change/${requestId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            decision: true
        })
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else
                throw new Error(`Erro: ${response.status}`);
        })
        .then(data => console.log(data))
        .catch(error => console.error(error));
});

btnRejectRoleChangeRequest?.addEventListener('click', () => {
    const requestId = document.getElementById('modal-seller').getAttribute('data-request-id');

    fetch(`/api/role-change/${requestId}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            decision: false,
        })
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            } else
                throw new Error(`Erro: ${response.status}`);
        })
        .then(data => console.log(data))
        .catch(error => console.error(error));
})

btnConfirmAuctionVerification?.addEventListener('click', () => {
    const modalBody = document.getElementById('modal-al');
    const auctionId = modalBody.getAttribute('data-auction-id');

    updateAuctionAuthenticationStatus(auctionId, true);
});

btnRejectAuctionVerification?.addEventListener('click', () => {
    const modalBody = document.getElementById('modal-al');
    const auctionId = modalBody.getAttribute('data-auction-id');

    updateAuctionAuthenticationStatus(auctionId, false);
})

async function updateAuctionAuthenticationStatus(auctionId, status) {
    let responseMessage;
    try {
        const responseAuthentication = await fetch(`/api/auction/${auctionId}/authentication`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                status: status
            })
        })
        const data = await responseAuthentication.json();
        responseMessage = data['message'];

        if (!responseAuthentication.ok)
            throw new Error(`${responseAuthentication.status}: ${responseMessage}`);
        alert(responseMessage);

        //Publicar leilão se verificação foi aceite
        if (status)
            launchAuction(auctionId);

        location.reload();
    } catch (error) {
        console.log(responseMessage);
    }
}

async function launchAuction(auctionId) {
    let responseMessage;
    try {
        const response = await fetch(`/api/launch-auction/${auctionId}`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({})
        });

        const data = await response.json();
        responseMessage = data['message'];

        if (!response.ok)
            throw new Error(`${response.status}: ${responseMessage}`);

        console.log(responseMessage);
    } catch (error) {
        console.log(responseMessage);
    }
}

//ATUALIZAR LICITAÇÃO ATUAL CASO NA PÁGINA DE LEILÃO
let highestBid = 0;
if (bidInputField != null) {
    setInterval(getHighestBid, 1000);

    const auctionItemId = btnBid.getAttribute('data-auction-item-id');

    async function getHighestBid() {
        try {
            const response = await fetch(`/api/highest-bid/${auctionItemId}`)
            const data = await response.json();

            const highestBid = data['highestBid'];
            const bidElement = document.getElementById('highest-bid');
            bidElement.innerText = `${highestBid}€`;
        } catch (error) {
            console.log(error);
        }
    }
}
