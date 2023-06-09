const licitarBtns = Array.from(document.querySelectorAll(".my-card-sub > a"))
const searchIcon = document.getElementById("search-icon");
const profileIcon = document.getElementById("profile-icon");

const searchBar = document.getElementById("search-bar")
const profileMenu = document.getElementById("profile-menu");

//REGISTAR MODAL
const btnRegisterAccount = document.getElementById("btn-confirm-register-account");
const btnLogin = document.getElementById("btn-login");

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


btnRegisterAccount?.addEventListener('click', () => {
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
    const inputConfirmPassword = document.getElementById("input-register-confirm-password");
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

    if (password != confirmPassword)
        return;

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
        iban: iban
    };

    fetch('/api/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(account),
    })
        .then(response => {
            if (response.ok) {
                return response.json();
            }
            else
                throw new Error(`Erro: ${response.status}`);
        })
        .then(data => {
            alert(data['message']);

            location.reload();

        })
        .catch(error => console.log(error))

})

btnLogin?.addEventListener('click', () => {
    const inputEmail = document.getElementById("input-login-email");
    const inputPassword = document.getElementById("input-login-password");

    const email = inputEmail.value.trim();
    const password = inputPassword.value;

    const credentials = {
        email: email,
        password: password,
    }

    fetch('/api/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(credentials),
    })
        .then(response => response.json())
        .then(data => {
            location.reload();
        })
        .catch(error => console.error(error));

})