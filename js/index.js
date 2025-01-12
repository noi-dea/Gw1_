import "../css/style.css";
const btn = document.querySelector(".mobile-button");
const content = document.querySelector(".mobile-content");

btn.onclick = function(){
    content.classList.toggle("hidden");
}