import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

window.addEventListener("load", function () {
    const modal = document.getElementById("modalDialog");
    modal.classList.remove(`opacity-0`);

    setTimeout(function () {
        modal.classList.add("opacity-0");
        setTimeout(function () {
            modal.classList.add("hidden");
        }, 500);
    }, 10000);
});
const removeModel = document.getElementById("removeModel");
removeModel.addEventListener("click", function () {
    const modal = document.getElementById("modalDialog");
    modal.classList.add("hidden");
});
