@extends('layouts.auth')
@section('style')
<style>
    html,
body {
    height: 100%;
}

.form-signin {
    max-width: 330px;
    padding: 1rem;
}

.form-signin .form-floating:focus-within {
    z-index: 2;
}

.form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
}
</style>
@endsection
@section('content')
<main class="form-signin w-100 m-auto">
    <form method="post" action="{{ route('login.post') }}">
        @csrf
        <img class="mb-4" src="{{ asset('assets/img/logosh.png') }}" alt="Logo" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <!-- Email Input -->
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
            @error("email")
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password Input -->
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
            <label for="floatingPassword">Password</label>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Success Message -->
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        <!-- Error Message -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Submit Button -->
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <small class="text-center mt-3"><a href="{{route("register")}}">Create New Account</a></small>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>
</main>

@endsection