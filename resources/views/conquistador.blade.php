<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- ... -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        h1 {
            color: #3490dc;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
        li:last-child {
            border-bottom: none;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            transition: 0.3s;
            width: 50%;
        }
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
        }
        #toggleButton {
            background-color: #3490dc;
            color: white;
            padding: 12px 24px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
        }
        #toggleButton:hover {
            background-color: #1d68a7;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h1>Conquistador</h1>

            <button id="toggleButton">Mostrar Información</button>

            @if($conquistador)
            <div id="conquistadorInfo" style="display: none;">
                <ul>
                    <li>ID: {{ $conquistador->id }}</li>
                    <li>UID: {{ $conquistador->uid }}</li>
                    <li>Apellidos: {{ $conquistador->apellidos }}</li>
                    <li>Email: {{ $conquistador->email }}</li>
                    <li>Contraseña: {{ $conquistador->contraseña }}</li>
                    <li>Teléfono: {{ $conquistador->telefono }}</li>
                    <li>Fecha de Nacimiento: {{ $conquistador->fecha_nacimiento }}</li>
                    <li>Calle: {{ $conquistador->calle }}</li>
                    <li>Número Exterior: {{ $conquistador->numero_exterior }}</li>
                    <li>Número Interior: {{ $conquistador->numero_interior }}</li>
                    <li>Colonia: {{ $conquistador->colonia }}</li>
                    <li>Ciudad: {{ $conquistador->ciudad }}</li>
                    <li>Municipio: {{ $conquistador->municipio }}</li>
                    <li>Estado: {{ $conquistador->estado }}</li>
                    <li>País: {{ $conquistador->pais }}</li>
                    <li>Locale: {{ $conquistador->locale }}</li>
                    <li>Nombre del Tutor: {{ $conquistador->tutor_nombre }}</li>
                    <li>Tutor ID: {{ $conquistador->tutorid }}</li>
                    <li>Rol: {{ $conquistador->rol }}</li>
                    <li>Activo: {{ $conquistador->activo }}</li>
                </ul>

                <form action="/logout" method="GET">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
            </div>
            @else
                <p>No conquistador found.</p>
            @endif
        </div>
    </div>

    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            var info = document.getElementById('conquistadorInfo');
            if (info.style.display === 'none') {
                info.style.display = 'block';
                this.textContent = 'Ocultar Información';
            } else {
                info.style.display = 'none';
                this.textContent = 'Mostrar Información';
            }
        });
    </script>
</body>
</html>
