<x-dashboard-layout title="{{ $title }}">
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <h1>{{ __($title) }}</h1>
            <a href="{{ route('posts.create') }}" class="btn btn-primary d-none d-md-block" title="Add">
                {{ __('Add new post') }}
            </a>
        </div>
        @if (session()->has('message'))
            <div class="alert alert-info" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <a href="{{ route('posts.create') }}"
            class="floating-btn rounded-circle bg-primary text-white text-center shadow-sm d-md-none" title="Add">
            <i class="fas fa-plus"></i>
        </a>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card shadow-sm border-0">
                    <nav class="nav-pills p-3">
                        <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                            <x-nav-tabs.button status="publish" active="active">
                                {{ __('Publish') }}
                                <span class="badge bg-info">{{ count($posts->where('status', 'Publish')) }}</span>
                            </x-nav-tabs.button>
                            <x-nav-tabs.button status="draft" active="">
                                {{ __('Draft') }}
                                <span class="badge bg-info">{{ count($posts->where('status', 'Draft')) }}</span>
                            </x-nav-tabs.button>
                            <x-nav-tabs.button status="trash" active="">
                                {{ __('Trash') }}
                                <span class="badge bg-info">{{ count($posts->where('status', 'Trash')) }}</span>
                            </x-nav-tabs.button>
                        </div>
                    </nav>
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <x-nav-tabs.content class="show active" nav-status="publish">
                                <x-datatables>
                                    <x-slot name="heading">
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </x-slot>
                                    @php $i = 1 @endphp
                                    @foreach ($posts as $post)
                                        @if ($post->status == 'Publish')
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category->category }}</td>
                                                <td>{{ $post->status }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('posts.edit', $post->id) }}"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                title="Delete"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </x-datatables>
                            </x-nav-tabs.content>
                            <x-nav-tabs.content nav-status="draft">
                                <x-datatables>
                                    <x-slot name="heading">
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </x-slot>
                                    @php $i = 1 @endphp
                                    @foreach ($posts as $post)
                                        @if ($post->status == 'Draft')
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category->category }}</td>
                                                <td>{{ $post->status }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <a href="{{ route('posts.edit', $post->id) }}"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <i class="fas fa-pen"></i>
                                                        </a>
                                                        <form action="{{ route('posts.destroy', $post->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                title="Delete"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </x-datatables>
                            </x-nav-tabs.content>
                            <x-nav-tabs.content nav-status="trash">
                                <x-datatables>
                                    <x-slot name="heading">
                                        <th>{{ __('#') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Action') }}</th>
                                    </x-slot>
                                    @php $i = 1 @endphp
                                    @foreach ($posts as $post)
                                        @if ($post->status == 'Trash')
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ $post->category->category }}</td>
                                                <td>{{ $post->status }}</td>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <form action="{{ route('posts.restore', $post->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('put')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-info"
                                                                title="Restore"
                                                                onclick="return confirm('Restore this post?')">
                                                                <i class="fas fa-trash-restore"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('posts.delete', $post->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                title="Delete Permanent"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fas fa-times-circle"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </x-datatables>
                            </x-nav-tabs.content>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
