const loginBtn = document.getElementById("login-btn")

const licitarBtns = Array.from(document.querySelectorAll(".my-card-sub > a"))

loginBtn?.addEventListener("click", () => {
    window.location.href = "./perfilDados.html";
})

licitarBtns?.forEach(btn => {
    btn.addEventListener("click", () => {
        window.location.href = "./leilao.html"
    })
});