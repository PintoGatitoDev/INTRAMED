<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>INTRAMED</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link rel="stylesheet" type="text/css" href="/{{ assets('css/estilos.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
    <header class="w3-blue w3-center">
        <img src="/{{assets('img/app/Logo.png')}}" alt="Logo" id="Logo">
    </header>
    <nav>
        <div class="w3-bar w3-blue">
            <a href="/" class="w3-bar-item w3-button">Bienvenida</a>
            <div class="w3-dropdown-hover">
                <button class="w3-button">Citas</button>
                <div class="w3-dropdown-content w3-bar-block w3-card-4">
                    <a href="#" class="w3-bar-item w3-button w3-blue">Reservar Citas</a>
                    <a href="#" class="w3-bar-item w3-button w3-blue">Mis Citas</a>
                    <a href="#" class="w3-bar-item w3-button w3-blue">Citas Con pacientes</a>
                    <a href="#" class="w3-bar-item w3-button w3-blue">Informe de Citas</a>
                </div>
            </div>
            <a href="#" class="w3-bar-item w3-button w3-blue w3-right">Perfil</a>
        </div>
    </nav>
    <section>
