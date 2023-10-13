<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INTRAMED</title>
    <link rel="stylesheet" href="/{{ assets('css/styles.css') }}">
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
                        <li><a href="/User/profile">Perfil</a></li>
                        
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