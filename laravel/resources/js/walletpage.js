const btnConfirmCard = document.getElementById("btn-confirm-card");
const btnDeleteCard = document.getElementById("btn-delete-card");

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