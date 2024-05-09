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

    <h1 class="text-center">Instructor: {{$user->name}}</h1>
    <div class="sidenav">
        <a style="color: #f1f1f1; font-size: 20px;" href="{{route('instructor.index')}}">Clases</a>
        <a href="{{route('instructor.crear')}}">Crear clase</a>
        @foreach ($clasesDeInstructor as $clase)
        <a href="{{route('instructor.clases', $clase->id)}}">{{$clase->nombre}}</a>
        @endforeach
        <form action="/logout" method="get">
            @csrf
            <button type="submit">log out</button>
        </form>
    </div>
    <div class="main">
        <ul>
            @if ($status == "clase")
            <h3>Estudiantes de la clase {{$clase->nombre}}</h3>
            @foreach ($alumnos as $alumno)
            <h3>-{{$alumno->user->name}}</h3>
            @endforeach
            @endif
            @if ($status == "crear")
            <h3> Crear clase </h3>
            @endif
        </ul>
        <!-- SI estamos en la ruta instructor.clases mostrar estudiantes de dicha clase -->
    </div>
</body>

</html>
