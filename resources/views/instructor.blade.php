<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

        body {
            background-color: #f0f0f0;
        }

        .my-button {
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
            /* Your existing CSS */
        }

        .my-button:hover {
            background-color: #45a049;
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
            <button class="my-button-loggout" type="submit">log out</button>
        </form>
    </div>
    <div class="main">
        <ul>
            @if ($status == 'clase')
                {{ Log::info($clase) }}
                <h2>{{ $clase->nombre }}</h2>
                <form action={{ route('instructor.sendhw') }} method="post">
                    @csrf
                    <table>
                        <tr>
                            <th>Nombre</th>
                            @foreach ($tareas as $tarea)
                                <th><a style="color: #111"
                                        href="/instructor/tarea/{{ $tarea->id }}">{{ $tarea->nombre }}</a></th>
                            @endforeach
                        </tr>
                        @foreach ($conquistadores as $conquistador)
                            <tr>
                                <td><a style="color: #111"
                                        href="/instructor/conquistador/{{ $conquistador->user->id }}">{{ $conquistador->user->name }}</a>
                                </td>
                                @foreach ($conquistador->tareas as $tareaa)
                                    <td>
                                        @if ($tareaa->clase_id === $clase->id)
                                            {{ Log::info($tareaa->pivot->tarea_id . '-' . $tareaa->pivot->conquistador . '-' . $tareaa->pivot->completada) }}
                                            <input type="checkbox"
                                                name="{{ $tareaa->pivot->tarea_id . '-' . $tareaa->pivot->conquistador }}"
                                                value="1" @if ($tareaa->pivot->completada == 1) checked @endif>
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </table>
                    <button class="my-button" type="submit">Enviar</button>
                </form>

                <h3>Asistencia</h3>
                <form action="{{ route('instructor.definer') }}" method="post">
                    @csrf
                    <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
                    <table>
                        <tr>
                            <th>Nombre</th>
                            @foreach ($asistencias as $fechas)
                                <th>{{ $fechas->fecha }}</th>
                            @endforeach
                            <th><button type="submit" name="adddia">+</button>
                                <button type="submit" name="deleteDia">-</button>
                            </th>
                        </tr>
                        @foreach ($conquistadores as $conquistador)
                            <tr>
                                <td>{{ $conquistador->user->name }}</td>
                                @if ($conquistador->asistencias && $conquistador->asistencias->count() == 0)
                                    <td>
                                        <input type="checkbox"
                                            name="asistencia_{{ $conquistador->id . '-' . $asistencias[0]->id }}"
                                            value="1">
                                        <select
                                            name="pulcritud_{{ $asistencia->pivot->id_asistencia . '-' . $asistencia->pivot->id_conquistador }}">
                                            <option value="1" @if ($asistencia->pivot->pulcritud == 1) selected @endif>1
                                            </option>
                                            <option value="2" @if ($asistencia->pivot->pulcritud == 2) selected @endif>2
                                            </option>
                                            <option value="3" @if ($asistencia->pivot->pulcritud == 3) selected @endif>3
                                            </option>
                                            <option value="4" @if ($asistencia->pivot->pulcritud == 4) selected @endif>4
                                            </option>
                                            <option value="5" @if ($asistencia->pivot->pulcritud == 5) selected @endif>5
                                            </option>
                                        </select>
                                    </td>
                                @else
                                    @foreach ($conquistador->asistencia as $asistencia)
                                        @if ($asistencia->id_clase === $clase->id)
                                            <td>
                                                <input type="checkbox"
                                                    name="asistencia_{{ $asistencia->pivot->id_asistencia . '-' . $asistencia->pivot->id_conquistador }}"
                                                    value="1" @if ($asistencia->pivot->asistio == 1) checked @endif>
                                                <select
                                                    name="pulcritud_{{ $asistencia->pivot->id_asistencia . '-' . $asistencia->pivot->id_conquistador }}">
                                                    <option value="1"
                                                        @if ($asistencia->pivot->pulcritud == 1) selected @endif>1</option>
                                                    <option value="2"
                                                        @if ($asistencia->pivot->pulcritud == 2) selected @endif>2</option>
                                                    <option value="3"
                                                        @if ($asistencia->pivot->pulcritud == 3) selected @endif>3</option>
                                                    <option value="4"
                                                        @if ($asistencia->pivot->pulcritud == 4) selected @endif>4</option>
                                                    <option value="5"
                                                        @if ($asistencia->pivot->pulcritud == 5) selected @endif>5</option>
                                                </select>
                                            </td>
                                        @endif
                                    @endforeach
                                @endif
                            </tr>
                        @endforeach
                    </table>
                    <button class="my-button" type="submit" name="save">Enviar</button>
                </form>

                <h3>Añadir alumnos a la clase</h3>
                <form action="{{ route('instructor.anadirAlumnos') }}" method="post">
                    @csrf
                    <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
                    <input type="text" name="alumnos" placeholder="Id de los alumnos separados por comas">
                    <button class="my-button" type="submit">Añadir</button>
                </form>

                <h3>Eliminar alumnos de la clase</h3>
                <form action="{{ route('instructor.eliminarAlumnos') }}" method="post">
                    @csrf
                    <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
                    <input type="text" name="alumnos" placeholder="Id de los alumnos separados por comas">
                    <button class="my-button" type="submit">Eliminar</button>
                </form>

                <h3>Crear tarea</h3>
                <form action="{{ route('instructor.crearTarea') }}" method="post">
                    @csrf
                    <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
                    <input type="text" name="nombre" placeholder="Nombre de la tarea">
                    <input type="text" name="descripcion" placeholder="Descripcion de la tarea">
                    <input type="date" name="fecha" placeholder="Fecha de la tarea">
                    <button class="my-button" type="submit">Crear</button>
                </form>

                <h3>Modificar tarea</h3>
                <form action="{{ route('instructor.modificarTarea') }}" method="post">
                    @csrf
                    <input type="text" name="clase_id" value="{{ $clase->id }}" style="display: none;">
                    <input type="text" name="tarea_id" placeholder="Id de la tarea">
                    <input type="text" name="nombre" placeholder="Nombre de la tarea">
                    <input type="text" name="descripcion" placeholder="Descripcion de la tarea">
                    <input type="date" name="fecha" placeholder="Fecha de la tarea">
                    <button class="my-button" type="submit">Modificar</button>
                </form>
            @endif

            <!-- SI estamos en la ruta instructor.clases mostrar estudiantes de dicha clase -->

            @if ($status == 'crear')
                <h3> Crear clase </h3>
                <form action="{{ route('instructor.crear') }}" method="post">
                    @csrf
                    <input type="text" name="nombre" placeholder="Nombre de la clase">
                    <input type="number" name="edadMinima" placeholder="Edad mínima">
                    <input type="text" name="color" placeholder="Color">
                    <input type="text" name="logo" placeholder="Logo">
                    <input type="time" name="horario" placeholder="Horario">
                    <input type="time" name="horario2" placeholder="Horario">
                    <button class="my-button" type="submit">Crear</button>
                </form>
                <h3> Eliminar clase </h3>
                <form action="{{ route('instructor.eliminarClase') }}" method="post">
                    @csrf
                    <input type="text" name="clase_id" placeholder="Id de la clase">
                    <button class="my-button" type="submit">Eliminar</button>
                </form>
            @endif
            @if ($status == 'Mostar Tarea')
                <h2>Id: {{ $tarea->id }}</h2>
                <h2>{{ $tarea->nombre }}</h2>
                <h3>{{ $tarea->descripcion }}</h3>
                <h3>{{ $tarea->fecha }}</h3>
                <h3>Modificar tarea</h3>
                <form action="{{ route('instructor.modificarTarea') }}" method="post">
                    @csrf
                    <input type="hidden" name="tarea_id" value="{{ $tarea->id }}">
                    <input type="text" name="nombre" placeholder="Nombre de la tarea">
                    <input type="text" name="descripcion" placeholder="Descripcion de la tarea">
                    <input type="date" name="fecha" placeholder="Fecha de la tarea">
                    <button class="my-button" type="submit">Modificar</button>
                </form>
            @endif
            @if ($status == 'Mostar Conquistador')
                <h2>Conquistador: {{ $conquistador->user->id }}</h2>
                <h3>Nombre: {{ $conquistador->user->name }}</h3>
                <h3>Edad: {{ $conquistador->edad }}</h3>
                <h3>Telefono: {{ $conquistador->user->telefono }}</h3>
                <h3>Correo: {{ $conquistador->user->email }}</h3>
                <br>
                <h3>Tutor Legal: {{ $conquistador->tutorLegal->name . ' ' . $conquistador->tutorLegal->apellido }}</h3>
                <h3>Telefono: {{ $conquistador->tutorLegal->telefono }}</h3>
                <h3>Correo: {{ $conquistador->tutorLegal->email }}</h3>
                <h3>Direccion:
                    {{ $conquistador->tutorLegal->colonia . ' ' . $conquistador->tutorLegal->calle . ' ' . $conquistador->tutorLegal->numero_exterior }}
                </h3>
                <br>
            @endif

            @if ($status == 'nada')
                <h1>Selecciona una clase</h1>
                <h2>Tus datos</h2>
                <h3>Nombre: {{ $user->name }}</h3>
                <h3>Edad: {{ $user->edad }}</h3>
                <h3>Telefono: {{ $user->telefono }}</h3>
                <h3>Correo: {{ $user->email }}</h3>
                <h3>Direccion: {{ $user->colonia . ' ' . $user->calle . ' ' . $user->numero_exterior }}</h3>
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
    </div>

</body>

</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');

        var chk = $('input[type="checkbox"]');
        chk.each(function() {
            var v = $(this).attr('checked') == 'checked' ? 1 : 0;
            $(this).after('<input type="hidden" name="' + $(this).attr('name') + '" value="' + v +
                '" />');
        });

        chk.change(function() {
            var v = $(this).is(':checked') ? 1 : 0;
            $(this).next('input[type="hidden"]').val(v);
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        var select = document.querySelectorAll('select');

        var sel = $('select');
        sel.each(function() {
            var v = $(this).val();
            $(this).after('<input type="hidden" name="' + $(this).attr('name') + '" value="' + v +
                '" />');
        });

        sel.change(function() {
            var v = $(this).val();
            $(this).next('input[type="hidden"]').val(v);
        });
    });

    document.getElementById('my-form').addEventListener('submit', function(event) {
        var horario1 = document.getElementById('horario1').value;
        var horario2 = document.getElementById('horario2').value;
        document.getElementById('horario1').value = horario1 + '-' + horario2;
    });
</script>
