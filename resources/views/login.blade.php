<!-- resources/views/login.blade.php -->

<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required autofocus>
    </div>

    <!-- Password -->
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required autocomplete="current-password">
    </div>

    <!-- Remember Me -->
    <div>
        <label for="remember_me">
            <input id="remember_me" type="checkbox" name="remember">
            <span>Remember me</span>
        </label>
    </div>

    <div>
        <button type="submit">
            Log in
        </button>
    </div>
</form>
@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror

@errors
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@enderrors
