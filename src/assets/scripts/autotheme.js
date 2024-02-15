function setTheme(theme) {
    document.documentElement.setAttribute('data-bs-theme', theme);
    document.body.classList.remove('bs-light', 'bs-dark');
    document.body.classList.add(theme === 'dark' ? 'bs-dark' : 'bs-light');
}

let autoTheme = (e) => {
    if (e.matches) {
        setTheme('dark');
    } else {
        setTheme('light');
    }
};

let darkMode = window.matchMedia('(prefers-color-scheme: dark)');
darkMode.addListener(autoTheme);
let lightMode = window.matchMedia('(prefers-color-scheme: light)');
lightMode.addListener(autoTheme);

if (darkMode.matches) {
    setTheme('dark');
} else {
    setTheme('light');
}