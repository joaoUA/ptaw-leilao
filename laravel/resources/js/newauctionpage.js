const btnSubmitNewAuction = document.getElementById("btn-submit-new-auction");
const btnNewAuctionCollection = document.getElementById("flexSwitchCheckDefault");
const newAuctionCollectionPrice = document.getElementById("collectionPrice");
const btnNewAuctionItem = document.getElementById("btn-confirm-new-auction-item");
const imageAuctionItem = document.getElementById("imageInput");
const auctionItems = [];
let currentItemId = 0;

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

    const itemImage = imageAuctionItem.files[0]; // Get the selected image file
    const reader = new FileReader(); // Create a FileReader object

    reader.onload = () => {
        const imageData = reader.result; // Get the image data
    
        auctionItems.push({
            id: currentItemId,
            //Peça Leilao:
            precoInicial: itemPrice,
            //Peça Arte:
            nome: itemName,
            artista: itemArtist,
            ano: itemYear,
            categoria: itemCategory,
            imagem: imageData,
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
        itemInputArtist.value = "";
        itemInputYear.value = "";
        imageAuctionItem.value = "";
        itemInputCategory.selectedIndex = 0;

        if (auctionItems.length > 1) {
            btnNewAuctionCollection.disabled = false;
        }

        document.getElementById("btn-cancel-new-auction").click();
    };

    if (itemImage) {
        reader.readAsDataURL(itemImage); // Read the image file as data URL
      } else {
        // Handle the case when no image is selected
        alert("Please select an image");
        return;
      }

    auctionItems.push({
        id: currentItemId,
        //Peça Leilao:
        precoInicial: itemPrice,
        //Peça Arte:
        nome: itemName,
        artista: itemArtist,
        ano: itemYear,
        categoria: itemCategory,
    });
});

btnNewAuctionCollection?.addEventListener('click', () => {
    if (btnNewAuctionCollection.checked) {
        newAuctionCollectionPrice.disabled = false;
    } else {
        newAuctionCollectionPrice.disabled = true;
        newAuctionCollectionPrice.value = "";
    }
});

btnSubmitNewAuction?.addEventListener('click', async () => {
    const auctionName = document.getElementById("input-leilao-nome").value.trim();
    const collection = btnNewAuctionCollection.checked;
    let collectionPrice = 0;

    if (collection) {
        collectionPrice = newAuctionCollectionPrice.value;
    }

    const auction = {
        name: auctionName,
        collection: collection,
        collectionPrice: collectionPrice,
        items: auctionItems,
    };

    let responseMessage;

    try {
        const response = await fetch("/api/new-auction", {
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