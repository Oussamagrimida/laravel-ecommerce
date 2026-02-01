<x-guest-layout>
    <h3 class="text-center mb-4"><i class="fas fa-user-plus text-primary mr-2"></i>Create New Account</h3>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="form-group">
            <label for="name" class="font-weight-bold">Full Name</label>
            <input id="name" 
                   class="form-control @error('name') is-invalid @enderror" 
                   type="text" 
                   name="name" 
                   value="{{ old('name') }}" 
                   required 
                   autofocus 
                   autocomplete="name"
                   placeholder="Enter your full name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="form-group">
            <label for="email" class="font-weight-bold">Email Address</label>
            <input id="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
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
                   autocomplete="new-password"
                   placeholder="Enter your password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="form-group">
            <label for="password_confirmation" class="font-weight-bold">Confirm Password</label>
            <input id="password_confirmation" 
                   class="form-control @error('password_confirmation') is-invalid @enderror"
                   type="password"
                   name="password_confirmation" 
                   required 
                   autocomplete="new-password"
                   placeholder="Confirm your password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mb-0">
            <div class="d-flex justify-content-between align-items-center">
                <a class="text-primary" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt mr-1"></i>Already registered?
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="fas fa-user-plus mr-2"></i>Register
                </button>
            </div>
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="mb-0">Already have an account? 
                <a href="{{ route('login') }}" class="text-primary font-weight-bold">
                    <i class="fas fa-sign-in-alt mr-1"></i>Login Now
                </a>
            </p>
        </div>
    </form>
</x-guest-layout>
