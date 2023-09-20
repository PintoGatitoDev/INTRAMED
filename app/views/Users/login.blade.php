<?php render('header'); ?>


<section class="Contenido">
    <form action="VerifiedLogin" method="post" class="formulario" id="Login">
    <h2>Iniciar Sesion</h2>    
    <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" placeholder="example@example.com">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña">
        <input type="submit" value="Iniciar sesión">
    </form>
</section>

<?php render('footer'); ?>