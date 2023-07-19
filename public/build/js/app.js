document.addEventListener('DOMContentLoaded', function () {
    Theme();
});

const DarkMode = () => {
    document.querySelector("body").setAttribute("data-bs-theme", "dark");
    document.querySelector("#darkmode").setAttribute("class", "bi-sun-fill");
}

const LightMode = () => {
    document.querySelector("body").setAttribute("data-bs-theme", "light");
    document.querySelector("#darkmode").setAttribute("class", "bi bi-moon-fill");
}

const CurrentTheme = () => {
    document.querySelector("body").getAttribute("data-bs-theme") === "dark" ? LightMode() : DarkMode();
}

function Theme() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDarkMode.matches);

    if (prefiereDarkMode.matches) {
        DarkMode();
    } else {
        LightMode();
    }

    prefiereDarkMode.addEventListener('change', function () {
        if (prefiereDarkMode.matches) {
            DarkMode();
        } else {
            LightMode();
        }
    })

    const botonDarkMode = document.querySelector('.dark-mode');

    botonDarkMode.addEventListener('click', function () {
        CurrentTheme();
    })
}