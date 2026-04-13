const darkTxtToggle = document.querySelector('.darkToggle');
const dataTheme = document.documentElement.dataset.theme;

function setTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    document.cookie = "theme=" + theme + "; path=/; max-age=" + (60 * 60 * 24 * 30);

    const currentTheme = document.documentElement.dataset.theme;

    if (!(theme === 'dark' || currentTheme === 'dark')) {
        darkTxtToggle.classList.add('darkTxt');
    }
}