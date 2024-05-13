var loginToggle = document.getElementById("login");
var registerToggle = document.getElementById("register");
var togglebutton = document.getElementById("btn");

function register() {
    loginToggle.style.left = "-400px";
    registerToggle.style.left = "50px";
    togglebutton.style.left = "110px";
}
function login() {
    loginToggle.style.left = "50px";
    registerToggle.style.left = "450px";
    togglebutton.style.left = "0px";
}
