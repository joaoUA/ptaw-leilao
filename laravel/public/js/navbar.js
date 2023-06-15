import './login';

const searchIcon = document.getElementById("search-icon");
const profileIcon = document.getElementById("profile-icon");
const searchBar = document.getElementById("search-bar");
const profileMenu = document.getElementById("profile-menu");

searchIcon?.addEventListener("click", () => {
    searchBar?.classList.toggle("hidden");
});

profileIcon?.addEventListener("click", () => {
    profileMenu?.classList.toggle("hidden");
});