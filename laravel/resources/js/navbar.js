const btnRegisterAccount = document.getElementById("btn-confirm-register-account");
const btnLogin = document.getElementById("btn-login");
const btnLogout = document.getElementById("btn-logout");
const searchIcon = document.getElementById("search-icon");
const profileIcon = document.getElementById("profile-icon");
const searchBar = document.getElementById("search-bar");
const profileMenu = document.getElementById("profile-menu");
const errorMsg = document.getElementById("error-msg");
let timeoutId;

searchIcon?.addEventListener("click", () => {
    searchBar?.classList.toggle("hidden");
});

profileIcon?.addEventListener("click", () => {
    profileMenu?.classList.toggle("hidden");
});

btnLogin?.addEventListener('click', async () => {
    const inputEmail = document.getElementById("input-login-email");
    const inputPassword = document.getElementById("input-login-password");

    const email = inputEmail.value.trim();
    const password = inputPassword.value;

    const credentials = {
        email: email,
        password: password,
    };

    let responseMessage;
    let responseStatus;
    try {
        const response = await fetch('/api/login', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(credentials)
        });

        const data = await response.json();
        responseMessage = data['message'];


        if (!response.ok) {
            responseStatus = response.status;
            throw new Error(`${response.status}: ${responseMessage}`);
        }
        alert(responseMessage);
        location.reload();
    } catch (error) {
        if (responseStatus == 401) {
            errorMsg.innerText = responseMessage;
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => {
                errorMsg.innerText = "";
            }, 3000);
        }
        console.log(responseMessage);
    }
})

btnLogout?.addEventListener('click', async (e) => {
    e.preventDefault();

    try {
        const response = await fetch('/api/logout', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: "",
        });

        if (response.redirected)
            window.location.href = response.url;
        else if (response.ok)
            console.log('Logout com sucesso!');
        else
            console.error('Erro ao tentar fazer logout');
        location.reload();
    } catch (error) {
        console.log(error);
    }
})

btnRegisterAccount?.addEventListener('click', async () => {
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
        name: firstName,
        surname: surname,
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

    let responseMessage;
    try {
        const response = await fetch('/api/register', {
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
        location.reload();
    } catch (error) {
        console.log(responseMessage);
    }
})