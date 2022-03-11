<x-app-layout title="{{ $title }}" class="sb-nav-fixed">
    <x-top-nav />
    <div id="layoutSidenav">
        <x-side-nav />
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">{{ __('Dashboard') }}</h1>
                </div>
            </main>
            <x-footer />
        </div>
    </div>
</x-app-layout>
