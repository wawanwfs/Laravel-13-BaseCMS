import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.themeController = function () {
    return {
        isDark: false,
        init() {
            const stored = localStorage.getItem('theme');
            this.isDark = stored ? stored === 'dark' : window.matchMedia('(prefers-color-scheme: dark)').matches;
            this.apply();
        },
        toggle() {
            this.isDark = ! this.isDark;
            localStorage.setItem('theme', this.isDark ? 'dark' : 'light');
            this.apply();
        },
        apply() {
            document.documentElement.classList.toggle('dark', this.isDark);
        },
    };
};

document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach((element) => observer.observe(element));
});

Alpine.start();
