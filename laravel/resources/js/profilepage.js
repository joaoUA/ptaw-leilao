const btnConfirmProfileChanges = document.getElementById("btn-confirm-profile-changes");
const btnRequestSellerStatus = document.getElementById("btn-request-seller-status");
const btnRequestAdminStatus = document.getElementById("btn-request-admin-status");

btnConfirmProfileChanges?.addEventListener('click', async() => {
    console.log("ola");
    //#region Input Elements
    /*const inputFirstname = document.getElementById("input-profile-first-name");
    const inputSurname = document.getElementById("input-profile-surname");
    const inputBirthday = document.getElementById("input-profile-birthday");
    const inputAddress = document.getElementById("input-profile-address");
    const inputPostcode = document.getElementById("input-profile-postcode");
    const inputCity = document.getElementById("input-profile-city");
    const inputCountry = document.getElementById("input-profile-country");
    const inputEmail = document.getElementById("input-profile-email");
    const inputNif = document.getElementById("input-profile-nif");
    const inputIban = document.getElementById("input-profile-iban");
    const inputPassword = document.getElementById("input-profile-password");
    const inputConfirmPassword = document.getElementById("input-profile-confirm-password");
    const userId = btnConfirmProfileChanges.getAttribute("data-user-id");
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
        id: userId,
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

    try {
        const response = fetch('/api/register', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(account),
        });

        const data = await response.json();
        responseMessage = data['message'];

        if (!response.ok)
            throw new Error(`${response.status}: ${responseMessage}`);
        alert(responseMessage);
        //location.reload();
    } catch (error) {
        console.log(responseMessage);
    }*/

});


btnRequestSellerStatus?.addEventListener('click', async () => {
    const userId = btnRequestSellerStatus.getAttribute('data-user-id')

    try {
        const response = await fetch(`/api/role-change/${userId}/seller`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}),
        });

        if (response.ok)
            window.location.reload();
        else
            throw new Error(`Erro: ${response.status}`);

    } catch (error) {
        console.error(error)
    }
});

btnRequestAdminStatus?.addEventListener('click', async () => {
    const userId = btnRequestAdminStatus.getAttribute('data-user-id');

    try {
        const response = await fetch(`/api/role-change/${userId}/admin`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}),
        });

        if (!response.ok)
            throw new Error(`Erro: ${response.status}`);

    } catch (error) {
        console.log(error);
    }
})