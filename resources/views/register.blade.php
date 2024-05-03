<!-- resources/views/register.blade.php -->

<form method="POST" action="{{ route('register') }}">
    @csrf

    <label for="name">Name</label>
    <input id="name" type="text" name="name" required autofocus>

    <label for="nombre">Nombre</label>
    <input id="nombre" type="text" name="nombre" required>

    <label for="apellido">Apellido</label>
    <input id="apellido" type="text" name="apellido" required>

    <label for="email">Email</label>
    <input id="email" type="email" name="email" required>

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required>

    <label for="telefono">Telefono</label>
    <input id="telefono" type="text" name="telefono">

    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" required>

    <label for="Calle">Calle</label>
    <input id="Calle" type="text" name="Calle" required>

    <label for="numero_exterior">Numero Exterior</label>
    <input id="numero_exterior" type="text" name="numero_exterior" required>

    <label for="numero_interior">Numero Interior</label>
    <input id="numero_interior" type="text" name="numero_interior">

    <label for="colonia">Colonia</label>
    <input id="colonia" type="text" name="colonia" required>

    <label for="ciudad_id">Ciudad</label>
    <select id="ciudad_id" name="ciudad_id" required>
        <option value="">Select a city</option>
        @foreach($ciudades as $ciudad)
            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
        @endforeach
    </select>

    <label for="codigo_postal">Codigo Postal</label>
    <input id="codigo_postal" type="text" name="codigo_postal" required>

    <label for="sexo">Sexo</label>
    <select id="sexo" name="sexo" required>
        <option value="">Select a gender</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="other">Other</option>
    </select>

    <button type="submit">
        Register
    </button>
</form>
