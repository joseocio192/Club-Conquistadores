<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor</title>
    <link href="{{ asset('/css/instructor.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>    
    <div class="sidenav">
        <h1 class="text-center">Instructor: {{ $user->name }}</h1>
            <a href="{{ route('instructor.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/>
                </svg>
                Clases 
            </a>
            <a href="{{ route('instructor.crear') }}">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/>
                </svg>
                Gestionar clases
            </a>
        <!--Ojo las variables dentro de los foreach NO SON LOCALES -->
        @foreach ($clasesDeInstructor as $clases)
            <a href="{{ route('instructor.clases', $clases->id) }}">{{ $clases->nombre }}</a>
        @endforeach
        <form action="/logout" method="get">
            @csrf
            <button class="my-button-loggout" type="submit">Cerrar sesion</button>
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
                            @if ($tareas->count() == 0)
                                <th>No hay tareas</th>

                            @else
                            @foreach ($tareas as $tarea)
                                <th><a style="color: #111"
                                        href="/instructor/tarea/{{ $tarea->id }}">{{ $tarea->nombre }}</a></th>
                            @endforeach
                            @endif
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
                            @if ($asistencias->count() == 0)
                                <th>No hay asistencias</th>
                            @else
                                @foreach ($asistencias as $asistencia)
                                    <th>{{ $asistencia->fecha }}</th>
                                @endforeach
                            @endif
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
