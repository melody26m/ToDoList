@extends("layouts.auth")

@section("styles")
<style>
    html, body {
        height: 100%;
    }
    .form-signing {
        max-width: 330px;
        padding: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: whitesmoke;
        font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        color: #333;
    }
    .form-signing .form-floating:focus-within {
        z-index: 2;
    }
    .form-signing input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
    }
    .form-signing input[type="password"] {
        border-top-left-radius: 0;
        border-top-right-radius: 0;
    }
</style>
@endsection

@section("content")
<main class="form-signing w-100 m-auto">
    <form method="post" action="{{ route('login.post') }}">
        @csrf

        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="floatingInput">Email address</label>
            @error('email')
                <span class="danger-email">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
            @error('password')
                <span class="danger-password">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-check text-start mb-3">
            <input class="form-check-input" type="checkbox" value="remember me?" id="rememberMe" name="remember">
            <label class="form-check-label" for="rememberMe">Remember me?</label>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if(session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2025–2027</p>
    </form>
</main>
@endsection
