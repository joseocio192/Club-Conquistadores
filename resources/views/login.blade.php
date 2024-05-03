<!-- resources/views/login.blade.php -->

<form method="POST" action="{{ route('login') }}">
    @csrf

    <label for="email">Email</label>
    <input id="email" type="email" name="email" required autofocus>

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required>

    <button type="submit">
        Log in
    </button>
</form>
