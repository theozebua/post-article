<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">{{ __('User') }}</div>
                <a class="nav-link" href="{{ route('dashboard.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    {{ __('Dashboard') }}
                </a>
                <div class="sb-sidenav-menu-heading">{{ __('Menu') }}</div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    {{ __('Posts') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">{{ __('Categories') }}</a>
                        <a class="nav-link" href="#">{{ __('Posts') }}</a>
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">{{ __('Logged in as:') }}</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>
