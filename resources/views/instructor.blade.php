<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        #instructorData {
            display: none;
        }

        #toggleButton {
            margin-top: 20px;
        }

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

        /* On smaller screens, where height is less than 450px, change the style of the sidebar (less padding and a smaller font size) */
        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>

    <h1 class="text-center">Instructor: {{ $user->name }}</h1>
    <div class="sidenav">
        <a style="color: #f1f1f1; font-size: 20px;" href="{{ route('instructor.index') }}">Clases</a>
        <a href="{{ route('instructor.crear') }}">Gestionar clases</a>
        <!--Ojo las variables dentro de los foreach NO SON LOCALES -->
        @foreach ($clasesDeInstructor as $clases)
        <a href="{{ route('instructor.clases', $clases->id) }}">{{ $clases->nombre }}</a>
        @endforeach
        <form action="/logout" method="get">
            @csrf
            <button type="submit">log out</button>
        </form>
    </div>
    <div class="main">
        <ul>
            <!-- SI estamos en la ruta instructor.clases mostrar estudiantes de dicha clase -->
            @if ($status == 'clase')
            <h3>Estudiantes de la clase {{ $clase->nombre }} id: {{ $clase->id }}</h3>
            @foreach ($conquistadores as $conquistador)
            <h3>-{{ $conquistador->user->name }} {{ $conquistador->id }}</h3>
            @if ($conquistador->tareas === null)
            <h4>No tiene tareas</h4>
            @else
            <form action={{ route('instructor.sendhw') }} method="post">
                <h4>Tareas:</h4>
                @foreach ($conquistador->tareas as $tarea)
                <h4>{{ $tarea->nombre }} <input type="checkbox" name="{{ $tarea->id }}" @if($tarea->pivot->completada) checked @endif></h4>
                @endforeach
                <button type="submit">Enviar</button>

            </form>
            @endif
            @endforeach

            <h3>Añadir alumnos a la clase</h3>
            <form action="{{ route('instructor.anadirAlumnos') }}" method="post">
                @csrf
                <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
                <input type="text" name="alumnos" placeholder="Id de los alumnos separados por comas">
                <button type="submit">Añadir</button>
            </form>

            <h3>Eliminar alumnos de la clase</h3>
            <form action="{{ route('instructor.eliminarAlumnos') }}" method="post">
                @csrf
                <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
                <input type="text" name="alumnos" placeholder="Id de los alumnos separados por comas">
                <button type="submit">Eliminar</button>
            </form>
            @endif


            @if ($status == 'crear')
            <h3> Crear clase </h3>
            <form action="{{ route('instructor.crear') }}" method="post">
                @csrf
                <input type="text" name="nombre" placeholder="Nombre de la clase">
                <input type="text" name="color" placeholder="Color">
                <input type="text" name="logo" placeholder="Logo">
                <input type="text" name="horario" placeholder="Horario">
                <button type="submit">Crear</button>
            </form>
            <h3> Eliminar clase </h3>
            <form action="{{ route('instructor.eliminarClase') }}" method="post">
                @csrf
                <input type="text" name="clase_id" placeholder="Id de la clase">
                <button type="submit">Eliminar</button>
            </form>
            @endif
        </ul>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

</body>

</html>
