<x-app-layout title="{{ $title }}" class="sb-nav-fixed">
    <x-top-nav />
    <div id="layoutSidenav">
        <x-side-nav />
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">{{ __('Preview') }}</h1>
                    @if ($posts->isEmpty())
                        <div class="alert alert-info" role="alert">
                            <span class="text-center d-block">No posts found</span>
                        </div>
                    @endif
                    <div class="row mb-5">
                        @foreach ($posts as $post)
                            <div class="col-12 col-md-4 col-lg-3 mb-4">
                                <div class="card shadow-sm border-0 h-100">
                                    <div class="card-body">
                                        <span class="fw-bold d-block mb-3">{{ $post->title }}</span>
                                        <span class="d-block mb-3">Category : {{ $post->category->category }}</span>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between align-items-center">
                                        <span class="d-block small">{{ $post->created_at->diffForHumans() }}</span>
                                        <a href="{{ route('preview.show', $post->id) }}"
                                            class="text-decoration-none">Read
                                            more...</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-4">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </main>
            <x-footer />
        </div>
    </div>
</x-app-layout>
