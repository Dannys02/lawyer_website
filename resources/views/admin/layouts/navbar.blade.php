<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4 text-dark" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Quick Title or Breadcrumb Indicator -->
        <div class="navbar-nav align-items-center d-none d-sm-flex">
            <div class="nav-item d-flex align-items-center gap-2">
                <span class="badge rounded-pill bg-ns-gold-400-20 text-ns-gold-400 border border-ns-gold-400-30 px-3 py-1 text-xs">
                    <i class="ti ti-shield-check me-1"></i> Panel Kendali Advokat
                </span>
            </div>
        </div>

        <ul class="navbar-nav flex-row align-items-center ms-auto gap-2">
            <!-- View Website Button -->
            <li class="nav-item d-none d-md-block">
                <a href="{{ route('welcome') }}" target="_blank" class="btn btn-sm btn-outline-warning text-ns-gold-400 border-ns-gold-400-40 d-flex align-items-center gap-1">
                    <i class="ti ti-external-link ti-xs"></i>
                    <span>Lihat Web</span>
                </a>
            </li>

            <!-- User Dropdown -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="d-flex align-items-center gap-2">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt="Admin Avatar" class="rounded-circle border border-ns-gold-400-40" />
                        </div>
                        <div class="d-none d-lg-flex flex-column text-start">
                            <span class="text-dark fw-semibold lh-1" style="font-size: 0.85rem;">Admin Lawyer</span>
                            <small class="text-ns-gold-400" style="font-size: 0.7rem;">Administrator</small>
                        </div>
                        <i class="ti ti-chevron-down ti-xs text-muted d-none d-lg-block ms-1"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end shadow-lg border border-light py-2">
                    <li class="px-3 py-2 border-bottom">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0 me-2">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('interface/img/LOGO_NS_2.png') }}" alt class="rounded-circle" />
                                </div>
                            </div>
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="mb-0 text-dark fw-semibold text-truncate">Admin Lawyer</h6>
                                <small class="text-muted text-truncate d-block">admin.lawyer@gmail.com</small>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="dropdown-item py-2" href="{{ route('welcome') }}" target="_blank">
                            <i class="ti ti-world me-2 text-ns-gold-400 ti-16px"></i>
                            <span>Kunjungi Website Utama</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1"></div>
                    </li>
                    <li>
                        <div class="px-2 pt-1 pb-1">
                            <a class="btn btn-sm btn-danger w-100 d-flex align-items-center justify-content-center gap-2"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti ti-logout ti-14px"></i>
                                <span>Keluar / Logout</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/ User Dropdown -->
        </ul>
    </div>
</nav>
