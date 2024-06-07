<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link href="{{ asset('/css/footer.css') }}" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <main class="py-4">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>
<script>
    document.getElementById('lang').onchange = function() {
        window.location.href = `/lang/${this.value}`;
    };
</script>

</html>
