<nav class="app-header navbar navbar-expand bg-body ps-3 pe-3"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            {{-- <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i> </a> </li> --}}
            <li class="nav-item d-none d-md-block bg-light">
                <a href="{{ route('web.home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" srcset="" width="120px">
            </a>
            </li>
            {{-- <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Home</a> </li>
            <li class="nav-item d-none d-md-block"> <a href="#" class="nav-link">Contact</a> </li> --}}
        </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->

        <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search-->
            <li class="nav-item"> <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    {{-- <i class="bi bi-search"></i> --}}
                </a> </li>
            <!--end::Navbar Search-->
            <!--begin::Messages Dropdown Menu-->


            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                        id="language-selector" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                        data-bs-display="static">
                        <span class="language-icon-active">
                            @if (app()->getLocale() == 'en')
                                <img src="{{ asset('assets/images/en-flag.png') }}" width="24px" alt="English Flag">
                            @else
                                <img src="{{ asset('assets/images/ar-flag.png') }}" width="24px" alt="Arabic Flag">
                            @endif
                        </span>
                        <span class="d-lg-none ms-2" id="language-text">Select Language</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="language-text"
                        style="--bs-dropdown-min-width: 8rem;">
                        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <li>
                                <a class="dropdown-item d-flex align-items-center" rel="alternate"
                                    hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                    <img src="{{ asset('assets/images/' . $localeCode . '-flag.png') }}" width="24px"
                                        alt="{{ $properties['native'] }} Flag" class="me-2">
                                    {{ $properties['native'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
            </ul>





            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <button class="btn btn-link nav-link py-2 px-0 px-lg-2 dropdown-toggle d-flex align-items-center"
                        id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                        data-bs-display="static">
                        <span class="theme-icon-active">
                            {{-- <i class="my-1"></i> --}}
                            {{-- "bi bi-moon-fill me-2" --}}
                            <i class="bi bi-moon-fill me-2"></i>
                        </span>
                        <span class="d-lg-none ms-2" id="bd-theme-text">Toggle theme</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bd-theme-text"
                        style="--bs-dropdown-min-width: 8rem;">
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center active"
                                data-bs-theme-value="light" aria-pressed="false">
                                <i class="bi bi-sun-fill me-2"></i>
                                {{ __('dashboard.layout.light') }}
                                <i class="bi bi-check-lg ms-auto d-none"></i>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="dark" aria-pressed="false">
                                <i class="bi bi-moon-fill me-2"></i>
                                {{ __('dashboard.layout.dark') }}
                                <i class="bi bi-check-lg ms-auto d-none"></i>
                            </button>
                        </li>
                        {{-- <li>
                            <button type="button" class="dropdown-item d-flex align-items-center"
                                data-bs-theme-value="auto" aria-pressed="true">
                                <i class="bi bi-circle-fill-half-stroke me-2"></i>
                                Auto
                                <i class="bi bi-check-lg ms-auto d-none"></i>
                            </button>
                        </li> --}}
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
            <li>
                <button type="button" class="btn btn-link nav-link py-2 px-0 px-lg-2 d-flex align-items-center web_main_color web_main_font">
                    @if (Auth::user())
                    <a class="text-reset text-decoration-none" href="{{ route('dashboard') }}">
                        <i class="fa-solid fa-gear"></i>
                        {{ __('web.login.dashboard') }}
                    </a>
                    @else
                    <a class="text-reset text-decoration-none" href="{{ route('login') }}">
                        <i class="fa-solid fa-right-from-bracket me-1"></i>
                        {{ __('web.login.title') }}
                    </a>
                    @endif
                </button>
            </li>
        </ul>

        </ul> <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav>

<script>
    // Color Mode Toggler
    (() => {
        "use strict";

        const storedTheme = localStorage.getItem("theme");

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme;
            }

            return window.matchMedia("(prefers-color-scheme: dark)").matches ?
                "dark" :
                "light";
        };

        const setTheme = function(theme) {
            if (
                theme === "auto" &&
                window.matchMedia("(prefers-color-scheme: dark)").matches
            ) {
                document.documentElement.setAttribute("data-bs-theme", "dark");
            } else {
                document.documentElement.setAttribute("data-bs-theme", theme);
            }
        };

        setTheme(getPreferredTheme());

        const showActiveTheme = (theme, focus = false) => {
            const themeSwitcher = document.querySelector("#bd-theme");

            if (!themeSwitcher) {
                return;
            }

            const themeSwitcherText = document.querySelector("#bd-theme-text");
            const activeThemeIcon = document.querySelector(".theme-icon-active i");
            const btnToActive = document.querySelector(
                `[data-bs-theme-value="${theme}"]`
            );
            const svgOfActiveBtn = btnToActive.querySelector("i").getAttribute("class");

            for (const element of document.querySelectorAll("[data-bs-theme-value]")) {
                element.classList.remove("active");
                element.setAttribute("aria-pressed", "false");
            }

            btnToActive.classList.add("active");
            btnToActive.setAttribute("aria-pressed", "true");
            activeThemeIcon.setAttribute("class", svgOfActiveBtn);
            const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
            themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

            if (focus) {
                themeSwitcher.focus();
            }
        };

        window
            .matchMedia("(prefers-color-scheme: dark)")
            .addEventListener("change", () => {
                if (storedTheme !== "light" || storedTheme !== "dark") {
                    setTheme(getPreferredTheme());
                }
            });

        window.addEventListener("DOMContentLoaded", () => {
            showActiveTheme(getPreferredTheme());

            for (const toggle of document.querySelectorAll("[data-bs-theme-value]")) {
                toggle.addEventListener("click", () => {
                    const theme = toggle.getAttribute("data-bs-theme-value");
                    localStorage.setItem("theme", theme);
                    setTheme(theme);
                    showActiveTheme(theme, true);
                });
            }
        });
    })();
</script>
