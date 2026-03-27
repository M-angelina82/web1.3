const text = document.getElementById("text");
let isHidden = false;


document.getElementById("colorBtn").addEventListener("click", () => {
    text.style.color = "pink";
});


document.getElementById("sizeBtn").addEventListener("click", () => {
    text.style.fontSize = "30px";
});


document.getElementById("bgBtn").addEventListener("click", () => {
    text.style.backgroundColor = "blue";
});


document.getElementById("toggleBtn").addEventListener("click", () => {
    isHidden = !isHidden;
    text.style.display = isHidden ? "none" : "block";
});


document.getElementById("resetBtn").addEventListener("click", () => {
    text.style = "";
});