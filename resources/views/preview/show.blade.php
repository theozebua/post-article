<x-app-layout title="{{ $title }}" class="sb-nav-fixed">
    <x-top-nav />
    <div id="layoutSidenav">
        <x-side-nav />
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">{{ __($title) }}</h1>
                    <div class="row mb-5">
                        <div class="col-12">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <span class="h5 mb-3 d-block">{{ $post->title }}</span>
                                    <span class="d-block mb-3">Category : {{ $post->category->category }}</span>
                                    <span class="d-block small mb-3">{{ $post->created_at->diffForHumans() }}</span>
                                    <p>{{ $post->content }}</p>
                                    <a href="{{ route('preview.index') }}">&laquo; Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <x-footer />
        </div>
    </div>
</x-app-layout>
