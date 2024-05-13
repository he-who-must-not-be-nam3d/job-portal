const initApp = () => {
    const hamburgerBtn = document.getElementById("hamburger-button");
    const mobileMenu = document.getElementById("mobile-menu");
    const searchForm = document.getElementById("search-form");
    const footer = document.getElementById("footer");

    const toggleMenu = () => {
        mobileMenu.classList.toggle("hidden");
        mobileMenu.classList.toggle("flex");
        searchForm.classList.toggle("hidden");
        footer.classList.toggle("hidden");
        hamburgerBtn.classList.toggle("toggle-btn");
    };
    hamburgerBtn.addEventListener("click", toggleMenu);
    mobileMenu.addEventListener("click", toggleMenu);
};

document.addEventListener("DOMContentLoaded", initApp);

window.addEventListener("load", function () {
    document.getElementById("loader").style.display = "none";
});

document.querySelector("form").addEventListener("submit", function () {
    document.getElementById("loader").style.display = "block";
});
