<!-- resources/views/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login</title>
        <!-- ... -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>
<body>
    <div class="container">
                <div class="card">
                    <div class="card-header">
                        <h1>Login</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <label for="email">{{ __('E-Mail Address') }}</label>

                                <div>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            <div class="form-group row">
                                <label for="password" class="">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class='checkboxDiv'>
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}></input>

                                    <label for="remember">
                                        {{ __('Recordarme') }}
                                    </label>
                                </div>

                            <div class="buttonsDiv">
                                    <button type="submit">
                                        {{ __('Login') }}
                                    </button>
                                    <a href="/" class="botonInicio">Volver a inicio</a>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                            </div>
                        </form>
                    </div>
                </div>
    </div>
</body>
@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Upss...',
            text: 'Algo salio mal!',
            footer: '<ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>'
        })
    </script>
@endif
</html>
