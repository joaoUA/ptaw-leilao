const loginBtn = document.getElementById("login-btn")
const licitarBtns = Array.from(document.querySelectorAll(".my-card-sub > a"))
const searchIcon = document.getElementById("search-icon");
const profileIcon = document.getElementById("profile-icon");

const searchBar = document.getElementById("search-bar")
const profileMenu = document.getElementById("profile-menu");

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