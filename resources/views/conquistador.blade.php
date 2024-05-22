<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ... -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- ... -->
    <style>
        .sidenav {
            height: 100%;
            /* Full-height: remove this if you want "auto" height */
            width: 160px;
            /* Set the width of the sidebar */
            position: fixed;
            /* Fixed Sidebar (stay in place on scroll) */
            z-index: 1;
            /* Stay on top */
            top: 0;
            /* Stay at the top */
            left: 0;
            background-color: #111;
            /* Black */
            overflow-x: hidden;
            /* Disable horizontal scroll */
            padding-top: 20px;
        }

        /* The navigation menu links */
        .sidenav a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
        }

        /* When you mouse over the navigation links, change their color */
        .sidenav a:hover {
            color: #f1f1f1;
        }

        /* Style page content */
        .main {
            margin-left: 160px;
            /* Same as the width of the sidebar */
            padding: 0px 10px;
        }

        .my-button-loggout {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 4px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            position: absolute;
            bottom: 0;
            /* Your existing CSS */
        }

        .my-button-loggout:hover {
            background-color: #45a049;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Conquistador: {{$conquistador->user->name}}</h1>
    <div class="sidenav">
        <a href={{route('conquistador')}}>Info</a>
        @foreach($clasesConquistador as $clases)
        <a href="{{route('conquistador.clases', $clases->id)}}">{{$clases->nombre}}</a>
        @endforeach
        <form action="/logout" method="get">
            @csrf
            <button class="my-button-loggout" type="submit">log out</button>
        </form>
    </div>

    <div class="main">
        <ul>
            @if ($status == 'nada')
            <h1>Seleciona una clase</h1>
            <h2>Tus datos:</h2>
            <h3>Id: {{$conquistador->id}}</h3>
            <h3>Nombre: {{$conquistador->user->name}} {{$conquistador->user->apellido}}</h3>
            @endif
            @if ($status=='clase')
            <h1>Clase: {{$clase->nombre}}</h1>
            <table>
                <tr>
                    @foreach ($tareas as $tarea)
                    <th><a style="color: #111" href="/conquistador/tarea/{{ $tarea->id }}">{{ $tarea->nombre }}</a></th>
                    @endforeach
                </tr>
                <tr>

                    @foreach ($conquistador->tareas as $tareaa)
                    <td>
                        @if ($tareaa->clase_id === $clase->id)
                        {{ Log::info($tareaa->pivot->tarea_id . '-' . $tareaa->pivot->conquistador . '-' . $tareaa->pivot->completada) }}
                        <input onclick="return false;" type="checkbox" name="{{ $tareaa->pivot->tarea_id . '-' . $tareaa->pivot->conquistador }}" value="1" @if ($tareaa->pivot->completada == 1) checked @endif>
                        @endif
                    </td>
                    @endforeach
                </tr>
            </table>
            @endif
            @if ($status == 'Mostar Tarea')
            <h2>Id: {{ $tarea->id }}</h2>
            <h2>{{ $tarea->nombre }}</h2>
            <h3>{{ $tarea->descripcion }}</h3>
            <h3>{{ $tarea->fecha }}</h3>
            @endif

        </ul>
    </div>
</body>

</html>
