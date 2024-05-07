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
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Instructor</h1>

        <button id="toggleButton" class="btn btn-primary">Mostrar datos</button>

        <div id="instructorData" class="mt-4">
            <p>ID: {{ $instructor->id }}</p>
            <p>Nombre: {{ $instructor->nombre }}</p>
            <p>Email: {{ $instructor->email }}</p>
        </div>
    </div>

    <script>
        document.getElementById('toggleButton').addEventListener('click', function() {
            var data = document.getElementById('instructorData');
            if (data.style.display === 'none') {
                data.style.display = 'block';
                this.textContent = 'Ocultar datos';
            } else {
                data.style.display = 'none';
                this.textContent = 'Mostrar datos';
            }
        });
    </script>
</body>
</html>
