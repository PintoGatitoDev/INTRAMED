<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INTRAMED</title>
    <link rel="stylesheet" type="text/css" href="/{{ assets('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <header>
        <img src="/{{assets('img/app/Logo.png')}}" alt="" id="Logo">
        <nav id="Menu">
            <ul>
                <li><a href="/home">Bienvenida</a></li>
                <li>
                    <ul id="Control">
                        <?php
                            if(!isset($_SESSION['Email'])){?>
                        <li><a href="/login">Iniciar Sesion</a></li>
                        <li><a href="/register">Registrar</a></li>
                        <?php }
                        ?>
                        <?php
                            if(isset($_SESSION['Email']))
                            {?>
                        <li>
                            <a href="#">Citas</a>
                            <ul class="submenu">
                                <li><a href="/Citas/nueva">Reservar Nueva Cita</a></li>
                                <li><a href="/Citas/MisCitas">Mis citas</a></li>
                                <li><a href="/Citas/CPacientes">Citas Con Pacientes</a></li>
                                <li><a href="/Citas/Informe">Citas Con Pacientes</a></li>
                            </ul>
                        </li>
                        <li><a href="/User/profile">Perfil</a></li>

                        <?php
                            if($_SESSION['Rol'] != "Patient")
                            {?>
                        
                        <?php }
                        ?>
                        <li><a href="/logout">Cerrar Sesión</a>
                            <?php
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <main>