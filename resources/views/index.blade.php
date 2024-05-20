<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="{{ asset('/css/index.css') }}" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
    </style>
    <title>Club de Conquistadores</title>
</head>
<body>
        <div class="MainLayout">
            <nav>
                <img class="LogoNav" src="{{ asset('/imgs/logo.webp') }}"></img>
                <div class="NavOption1" onclick="window.location.href = '/register';">
                    Registrarse
                    <svg class='IconArrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                </div>
                <div class="NavOption2" onclick="window.location.href = '/login';">
                    Iniciar Sesión
                    <svg class='IconArrow' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                </div>
            </nav>
            <header>
                <h1>Club</h1>
                <h2>Conquistadores</h2>
            </header>
            <section></section>
            <footer>
                <img class="LogoFooter" src="{{ asset('/imgs/logo.webp') }}"></img>
                <div class='Info'>
                    <h2 class="h2Equipo">Equipo 12</h2>
                    <ul>
                        <li>Jose Pablo Ocio Mazo</li>
                        <li>Victor Ramon Grande Espinoza</li>
                        <li>Isaac David Beltran Beltran</li>
                        <li>Luis Xavier Acosta Chang</li>
                        <li>Manuel Alejandro Amezola Chaidez</li>
                    </ul>

                </div>
            </footer>
        </div>
        <aside>
            <img class="LogoAside" src="{{ asset('/imgs/logo2.webp') }}"></img>
        </aside>
</body>
</html>
