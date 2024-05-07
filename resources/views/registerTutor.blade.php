<!DOCTYPE html>
<html>

<head>
    <title>User Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        label, input, select {
            display: block;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>User Registration</h2>

        <form action="/registerTutorLegal" method="post">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="apellido">Apellido:</label><br>
            <input type="text" id="apellido" name="apellido"><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email"><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <label for="telefono">Telefono:</label><br>
            <input type="text" id="telefono" name="telefono"><br>
            <label for="fecha_nacimiento">Fecha de Nacimiento:</label><br>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento"><br>
            <label for="calle">Calle:</label><br>
            <input type="text" id="calle" name="calle"><br>
            <label for="numero_exterior">Numero Exterior:</label><br>
            <input type="text" id="numero_exterior" name="numero_exterior"><br>
            <label for="numero_interior">Numero Interior:</label><br>
            <input type="text" id="numero_interior" name="numero_interior"><br>
            <label for="colonia">Colonia:</label><br>
            <input type="text" id="colonia" name="colonia"><br>
            <label for="ciudad_id">Ciudad:</label><br>
            <input type="text" id="ciudad_id" name="ciudad_id"><br>
            <label for="codigo_postal">Codigo Postal:</label><br>
            <input type="text" id="codigo_postal" name="codigo_postal"><br>
            <label for="sexo">Sexo:</label><br>
            <select id="sexo" name="sexo">
                <option value="Hombre">Hombre</option>
                <option value="Mujer">Mujer</option>
                <option value="Otro">Otro</option>
            </select><br>
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
