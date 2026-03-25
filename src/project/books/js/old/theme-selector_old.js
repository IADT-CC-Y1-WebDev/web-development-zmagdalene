const lightTheme = document.getElementById('light');
const darkTheme = document.getElementById('dark');
const beigeTheme = document.getElementById('beige');
const natureTheme = document.getElementById('nature');

const savedTheme = localStorage.getItem("theme") || "light";
document.documentElement.setAttribute("data-theme", savedTheme);

function setTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    localStorage.setItem("theme", theme);
}