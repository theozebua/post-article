<x-dashboard-layout title="{{ $title }}">
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>{{ __('Categories') }}</h1>
            <a href="{{ route('categories.create') }}" class="btn btn-primary d-none d-md-block" title="Add">
                {{ __('Add new category') }}
            </a>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-info" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('categories.create') }}"
            class="floating-btn rounded-circle bg-primary text-white text-center shadow-sm d-md-none" title="Add">
            <i class="fas fa-plus"></i>
        </a>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <x-datatables>
                            <x-slot name="heading">
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Category') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </x-slot>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $category->category }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                            class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </x-datatables>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
