document.addEventListener("DOMContentLoaded", function () {
    loadTheme();
});

function setTheme(theme) {
    document.body.className = theme;

    localStorage.setItem("theme", theme);
}

function saveCustomTheme() {
    const bgColor = document.getElementById("bgColor").value;
    const textColor = document.getElementById("textColor").value;

    if (!bgColor || !textColor) {
        alert("Оберіть кольори!");
        return;
    }

    const customTheme = {
        background: bgColor,
        text: textColor
    };

    localStorage.setItem("customTheme", JSON.stringify(customTheme));
    localStorage.setItem("theme", "custom");

    applyCustomTheme(customTheme);
}

function applyCustomTheme(theme) {
    document.body.style.backgroundColor = theme.background;
    document.body.style.color = theme.text;
}

function loadTheme() {
    const theme = localStorage.getItem("theme");

    if (!theme) return;

    if (theme === "custom") {
        const saved = localStorage.getItem("customTheme");

        if (saved) {
            const parsed = JSON.parse(saved);
            applyCustomTheme(parsed);
        }
    } else {
        setTheme(theme);
    }
}

function resetTheme() {
    localStorage.removeItem("theme");
    localStorage.removeItem("customTheme");

    document.body.className = "light";
    document.body.style = "";
}