<!DOCTYPE html>
<html lang="en">

<head>
    <title>@lang('app.login')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="card">
        <div class="card-header">
            <img src="{{ asset('/imgs/logoSimple.webp') }}" alt="Club Conquistadores Logo">
            <h1>@lang('app.login')</h1>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email">@lang('app.email')</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group row">
                    <label for="password" class="">@lang('app.password')</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class='checkboxDiv'>
                    <input type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}></input>

                    <label for="remember">
                        @lang('app.remember_me')
                    </label>
                </div>

                <div class="buttonsDiv">
                    <button type="submit">
                        @lang('app.login')
                    </button>
                    <button type="button" onclick="window.history.go(-1); return false;"
                        class="botonInicio">@lang('app.back_home')</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            @lang('app.forgot_password')
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
    <footer>
        <div class='footerItems'>
            <select id="lang">
                <option value="en" {{ session('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="es" {{ session('locale') == 'es' ? 'selected' : '' }}>Español</option>
            </select>
        </div>
    </footer>
</body>
<script>
    document.getElementById('lang').onchange = function() {
        window.location.href = `/lang/${this.value}`;
    };
</script>

@if ($errors->any())
    <script>
        let errorsExist = true;
        let title_error = "{{ __('app.error_title') }}";
        let error = "{{ __('app.error_message') }}";
        let button = "{{ __('app.accept_error') }}";
        let errorList =
            '@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach';

        if (errorsExist) {
            Swal.fire({
                icon: 'error',
                title: title_error,
                text: error,
                confirmButtonText: button,
                footer: '<ul>' + errorList + '</ul>'
            });
        }
    </script>
@endif

</html>
