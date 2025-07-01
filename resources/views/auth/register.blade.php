@extends("layouts.auth")
@section("styles")
<style>
    html, body{
        height: 100%;
          }
          .form-signing {
            max-width: 330px;
            padding: 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: whitesmoke ;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
             color: #333;
          }
             .form-signing .form-floating:focus-within {
                 z-index: 2;
             }
             .form-signing input[type="email"]{
                 margin-bottom: -1px;
                 border-bottom-right-radius: 0;
                 border-bottom-left-radius: 0;
             }
             .form-signing input[type="password"]{
                 
                 border-top-left-radius: 0;
                 border-top-right-radius: 0;
             }
</style>
@endsection
@section("content")
<main class="form-signing w-100 m-auto">
    <form method="post" action="{{ route('register.post') }}">

        @csrf
    
        <h1 class="h3 mb-3 fw-normal">Create an account</h1>

        <div class="form-floating">
            <input type="text" class="form-control" id="floatingInput"  name="name" placeholder="Enter your fullname">
            <label for="floatingInput"> Full-name</label>
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
            
        </div>
        <div class="form-floating">
            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput"> Email address</label>
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-floating" style="margin-bottom: 10px;">
            <input type="password" name="password"  class="form-control" id="floatingPassword" placeholder="password">
            <label for="floatingPassword">Password</label>
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-floating" style="margin-bottom: 10px;">
    <input type="password" class="form-control" id="floatingConfirmPassword" name="password_confirmation" placeholder="Confirm Password">
    <label for="floatingConfirmPassword">Confirm Password</label>
</div>
        @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        @endif
        @if(session("error"))
        <div class="alert alert-danger">{{ session("error") }}</div>
        @endif
           <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
           <p class="mt-5 mb-3 text-body-secondary">&copy; 2025</p>
    </form>
</main>

@endsection