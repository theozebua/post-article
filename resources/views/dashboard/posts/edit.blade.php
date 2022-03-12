<x-dashboard-layout title="{{ $title }}">
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ __($title) }}</h1>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">{{ __('Post') }}</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                    id="title" value="{{ old('title', $post->title) }}">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">{{ __('Category') }}</label>
                                <select class="form-select @error('category_id') is-invalid @enderror"
                                    name="category_id" id="category_id">
                                    <option selected hidden>{{ __('Select Category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" @selected(old('category_id', $post->category->id) == $category->id)>
                                            {{ $category->category }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <div class="mb-3">
                                    <label for="content" class="form-label">{{ __('Content') }}</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                        id="content" rows="10">{{ old('content', $post->content) }}</textarea>
                                    @error('content')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <span class="d-block mb-2">{{ __('Status') }}</span>
                                <input type="radio" class="btn-check" name="status" id="publish" autocomplete="off"
                                    value="Publish" @checked(old('status', $post->status) == 'Publish')>
                                <label class="btn btn-outline-success" for="publish">{{ __('Publish') }}</label>
                                <input type="radio" class="btn-check" name="status" id="draft" autocomplete="off"
                                    value="Draft" @checked(old('status', $post->status) == 'Draft')>
                                <label class="btn btn-outline-secondary" for="draft">{{ __('Draft') }}</label>
                            </div>
                            <button type="submit" class="btn btn-primary d-block ms-auto">{{ __('Save') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
