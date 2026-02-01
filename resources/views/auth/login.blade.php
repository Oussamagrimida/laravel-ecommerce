<x-guest-layout>
    <!-- Session Status -->
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <h3 class="text-center mb-4"><i class="fas fa-sign-in-alt text-primary mr-2"></i>Login to Your Account</h3>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="font-weight-bold">Email Address</label>
            <input id="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   autocomplete="username"
                   placeholder="Enter your email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="form-group">
            <label for="password" class="font-weight-bold">Password</label>
            <input id="password" 
                   class="form-control @error('password') is-invalid @enderror"
                   type="password"
                   name="password"
                   required 
                   autocomplete="current-password"
                   placeholder="Enter your password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="form-group">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember_me" name="remember">
                <label class="custom-control-label" for="remember_me">
                    Remember me
                </label>
            </div>
        </div>

        <div class="form-group mb-0">
            <div class="d-flex justify-content-between align-items-center">
                @if (Route::has('password.request'))
                    <a class="text-primary" href="{{ route('password.request') }}">
                        <i class="fas fa-key mr-1"></i>Forgot your password?
                    </a>
                @endif
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-sign-in-alt mr-2"></i>Log in
                </button>
            </div>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="mb-0">Don't have an account? 
                <a href="{{ route('register') }}" class="text-primary font-weight-bold">
                    <i class="fas fa-user-plus mr-1"></i>Register Now
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
