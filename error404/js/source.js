let body = document.querySelector("body");

body.addEventListener("mousemove" , func);


function func(e) {
    let x = e.clientX / 4;
    let y = e.clientY / 4;

    body.style.backgroundPositionX = x + "px";
    body.style.backgroundPositionY = y + "px";

}