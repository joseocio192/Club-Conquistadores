<!-- resources/views/register.blade.php -->
<style>
    form {
        width: 300px;
        margin: 0 auto;
    }
    label {
        display: block;
        margin-top: 20px;
    }
    input, select {
        width: 100%;
        height: 30px;
        margin-top: 5px;
    }
    button {
        margin-top: 20px;
        width: 100%;
        height: 35px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
    .radio-group {
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>


<form method="POST" action="{{ route('register') }}" id="registro">
    @csrf

    <h1>Registro</h1>

    <label for="name">Nombre</label>
    <input id="name" type="text" name="name" required autofocus><br>

    <label for="apellido">Apellido</label>
    <input id="apellido" type="text" name="apellido" required><br>

    <label for="email">Email</label>
    <input id="email" type="email" name="email" required><br>

    <label for="password">Password</label>
    <input id="password" type="password" name="password" required><br>

    <label for="telefono">Telefono</label>
    <input id="telefono" type="text" name="telefono"><br>

    <label for="fecha_nacimiento">Fecha de Nacimiento</label>
    <input id="fecha_nacimiento" type="date" name="fecha_nacimiento" required><br>

    <label for="calle">Calle</label>
    <input id="calle" type="text" name="calle" required><br>

    <label for="numero_exterior">Numero Exterior</label>
    <input id="numero_exterior" type="text" name="numero_exterior" required><br>

    <label for="numero_interior">Numero Interior</label>
    <input id="numero_interior" type="text" name="numero_interior"><br>

    <label for="colonia">Colonia</label>
    <input id="colonia" type="text" name="colonia" required><br>

    <label for="ciudad_id">Ciudad</label>
    <select id="ciudad_id" name="ciudad_id" required><br>
        <option value="">Select a city</option>
        @foreach($ciudades as $ciudad)
            <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
        @endforeach
    </select><br>

    <label for="codigo_postal">Codigo Postal</label>
    <input id="codigo_postal" type="text" name="codigo_postal" required><br>

    <label for="sexo">Sexo</label>
    <select id="sexo" name="sexo" required><br>
        <option value="">Select a gender</option>
        <option value="Hombre">Hombre</option>
        <option value="Mujer">Mujer</option>
        <option value="Otro">Otro</option>
    </select>



    <button type="submit">
        Register
    </button>

</form>
