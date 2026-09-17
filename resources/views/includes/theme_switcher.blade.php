{{-- Light / dark toggle: flips the current look (system preference included), the icon shows what the click gives. --}}
<li class="nav-item" x-data="{
        dark: document.documentElement.classList.contains('dark'),
        toggle() {
            localStorage.theme = this.dark ? 'light' : 'dark';
            ThemeSwitcher.setDarkClass();
            this.dark = document.documentElement.classList.contains('dark');
        },
    }">
    <a href="#" class="nav-link p-0" @click.prevent="toggle()" title="Light / dark" aria-label="Toggle dark mode">
        <i x-show="!dark" class="fas fa-moon"></i>
        <i x-show="dark" class="fas fa-sun"></i>
    </a>
</li>
