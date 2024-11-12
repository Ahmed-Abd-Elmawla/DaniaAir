<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand bg-light"> <!--begin::Brand Link--> <a href="{{ route('web.home') }}" class="brand-link">
            <!--begin::Brand Image--> <img src="{{ asset('assets/images/logo.png') }}" alt="Logo"
                class="brand-image max-h-50">
                 <!--end::Brand Image-->
        </a> <!--end::Brand Link-->
    </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <li class="nav-item"> <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house-check-fill"></i>
                        <p>{{ __('dashboard.layout.home') }}</p>
                    </a>
                </li>
                <li class="nav-item"> <a href="{{ route('admins.index') }}"
                        class="nav-link {{ request()->routeIs('admins.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-fill-check"></i>
                        <p>
                            {{ __('dashboard.layout.admins') }}
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('categories.index') }}"
                        class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-tags"></i>
                        <p>{{ __('dashboard.layout.safety_categories') }}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('items.index') }}"
                        class="nav-link {{ request()->routeIs('items.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-shield-check"></i>
                        <p>{{ __('dashboard.layout.safety_items') }}</p>
                    </a>
                </li>

                <li class="nav-item"> <a href="{{ route('reports.index') }}"
                        class="nav-link {{ request()->routeIs('reports.index') ? 'active' : '' }}">
                        <i class="nav-icon fa-solid fa-file-invoice"></i>
                        <p>
                            {{ __('dashboard.report.reports') }}
                        </p>
                    </a>
                </li>

            </ul>
            <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside>
