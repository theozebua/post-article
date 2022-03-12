<x-app-layout title="{{ $title }}" class="sb-nav-fixed">
    <x-top-nav />
    <div id="layoutSidenav">
        <x-side-nav />
        <div id="layoutSidenav_content">
            <main>
                {{ $slot }}
            </main>
            <x-footer />
        </div>
    </div>
</x-app-layout>
