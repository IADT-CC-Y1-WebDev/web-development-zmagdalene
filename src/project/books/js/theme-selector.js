function setTheme(theme) {
    document.documentElement.setAttribute("data-theme", theme);
    document.cookie = "theme=" + theme + "; path=/; max-age=" + (60 * 60 * 24 * 30);
}