const darkTxtToggle = document.querySelector('.darkToggle');
let themesDiv = document.querySelector('.themes');

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

let currentTheme = getCookie('theme');
if (!currentTheme) {
    currentTheme = 'light';
}
setTheme(currentTheme);

function setTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    document.cookie = "theme=" + theme + "; path=/; max-age=" + (60 * 60 * 24 * 30);

    currentTheme = theme;

    if (darkTxtToggle) {
        if (currentTheme !== 'dark') {
            darkTxtToggle.classList.add('darkTxt');
        }
        else {
            darkTxtToggle.classList.remove('darkTxt');
        }
    }
}

if (themesDiv) {
    themesDiv.addEventListener('click', function (evt) {
        let div = evt.target.closest('[data-theme]');
        let theme = div.dataset.theme;
        setTheme(theme);
    });
}