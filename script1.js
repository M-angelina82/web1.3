const input = document.getElementById("inputText");
const addBtn = document.getElementById("addBtn");
const sortBtn = document.getElementById("sortBtn");
const list = document.getElementById("list");

addBtn.addEventListener("click", () => {
    const value = input.value.trim();

    if (value === "") {
        alert("Введи текст");
        return;
    }

    const li = document.createElement("li");
    li.textContent = value;


    li.addEventListener("click", () => {
        li.remove();
    });

    list.appendChild(li);
    input.value = "";
});
sortBtn.addEventListener("click", () => {
    const items = Array.from(list.children);

    items.sort((a, b) =>
        a.textContent.localeCompare(b.textContent)
    );

    list.innerHTML = "";
    items.forEach(item => list.appendChild(item));
});