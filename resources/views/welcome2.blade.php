<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@lang('app.title')</title>

</head>

<body>
    <h1>@lang('app.title')</h1>
    <p>@lang('app.welcome')</p>

    <form action="{{ route('setlocale') }}" method="post">
        @csrf
        <select name="language" id="language" onchange="this.form.submit()">
            <option value="en" @if (session('locale') == 'en') selected @endif>English</option>
            <option value="es" @if (session('locale') == 'es') selected @endif>Español</option>
        </select>
    </form>



</body>

</html>
