var dropdown = document.querySelector(".dropdown");
var dropdownitems = document.getElementById("drop-down-items")

dropdown.addEventListener("click", function() {
    dropdownitems.classList.toggle("active");
})