<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light bg-white shadow-sm" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">{{ __('User') }}</div>
                <a class="nav-link {{ Route::is('dashboard.index') ? 'active' : '' }}"
                    href="{{ route('dashboard.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    {{ __('Dashboard') }}
                </a>
                <div class="sb-sidenav-menu-heading">{{ __('Menu') }}</div>
                <a class="nav-link {{ Route::is('categories*') || Route::is('posts*') || Route::is('preview*') ? 'active' : 'collapsed' }}"
                    href="javascript:;" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    {{ __('Posts') }}
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ Route::is('categories*') || Route::is('posts*') || Route::is('preview*') ? 'show' : '' }}"
                    id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Route::is('categories*') ? 'active' : '' }}"
                            href="{{ route('categories.index') }}">{{ __('Categories') }}</a>
                        <a class="nav-link {{ Route::is('posts*') ? 'active' : '' }}"
                            href="{{ route('posts.index') }}">{{ __('Posts') }}</a>
                        <a class="nav-link {{ Route::is('preview*') ? 'active' : '' }}"
                            href="{{ route('preview.index') }}">{{ __('Preview') }}</a>
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
