<x-app-layout title="{{ $title }}">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-sm border-0 rounded-lg mt-5">
                                <div class="card-body">
                                    <h3 class="text-center font-weight-light my-4">{{ __('Login') }}</h3>
                                    @if (session()->has('message'))
                                        <div class="alert alert-danger" role="alert">
                                            <i class="fas fa-exclamation-triangle"></i>
                                            <span>{{ session('message') }}</span>
                                        </div>
                                    @endif
                                    <form action="{{ route('auth.authenticate') }}" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" id="email" value="{{ old('email') }}"
                                                placeholder="email@example.com" aria-placeholder="email@example.com"
                                                autofocus />
                                            <label for="email">{{ __('Email address') }}</label>
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" id="password" placeholder="Password" />
                                            <label for="password">{{ __('Password') }}</label>
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <x-footer />
        </div>
    </div>
</x-app-layout>
