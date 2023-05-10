const loginBtn = document.getElementById("login-btn")

const licitarBtns = Array.from(document.getElementsByClassName("btn btn-dark bkg-terciary cl-primary fnt-m"))

loginBtn.addEventListener("click", () => {
    window.location.href = "./perfilDados.html";
})

licitarBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        window.location.href = "./leilao.html"
    })
});