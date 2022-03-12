<x-dashboard-layout title="{{ $title }}">
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ __($title) }}</h1>
        <div class="row mb-5">
            <div class="col-12 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="category" class="form-label">{{ __('Category') }}</label>
                                <input type="text" class="form-control @error('category') is-invalid @enderror"
                                    name="category" id="category" value="{{ old('category', $category->category) }}">
                                @error('category')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary d-block ms-auto">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
