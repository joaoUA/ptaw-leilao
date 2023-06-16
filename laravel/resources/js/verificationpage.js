const userVerificationItems = document.getElementById('seller-vt') ? Array.from(document.getElementById('seller-vt').getElementsByClassName('vt-item')) : null;
const auctionVerificationItems = document.getElementById('auction-vt') ? Array.from(document.getElementById('auction-vt').getElementsByClassName('vt-item')) : null;
const btnConfirmRoleChangeRequest = document.getElementById('btn-user-modal-confirm-request');
const btnRejectRoleChangeRequest = document.getElementById('btn-user-modal-reject-request');
const btnConfirmAuctionVerification = document.getElementById('btn-auction-modal-confirm-request');
const btnRejectAuctionVerification = document.getElementById('btn-auction-modal-reject-request');

auctionVerificationItems?.shift();
userVerificationItems?.shift();

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
            console.log(data['auction']);

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
                imageElement.src = `./storage/images/${auctionItem['imagem']}`
                imageElement.style.width = '48px';
                imageElement.style.height = '48px';
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
                    const modalArticleImage = document.getElementById('modal-auction-item-image');
                    const modalArticleDocument = document.getElementById('modal-auction-item-document');
                    modalArticleDocument.setAttribute('hidden', 'true');

                    modalArticleName.innerText = `Nome: ${auctionItem['peca_arte_nome']}`;
                    modalArticleYear.innerText = `Data: ${auctionItem['ano'] || 'N/A'}`;
                    modalArticleAuthor.innerText = `Artista: ${auctionItem['artista'] || 'N/A'}`;
                    modalArticlePrice.innerText = `Preço Inicial: ${auctionItem['preco_inicial']}€`;
                    modalArticleCategory.innerText = `Categoria: ${auctionItem['categoria_nome']}`;
                    modalArticleImage.src = `./storage/images/${auctionItem['imagem']}`
                    modalArticleImage.style.width = '224px';
                    modalArticleImage.style.height = '224px';
                    if(auctionItem['documento']){
                        modalArticleDocument.href = `./storage/documents/${auctionItem['documento']}`
                        modalArticleDocument.removeAttribute('hidden');
                    }
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