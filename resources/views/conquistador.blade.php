<h1>Conquistador</h1>

@if($conquistador)
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


@else
    <p>No conquistador found.</p>
@endif
