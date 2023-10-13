<?php render('header'); ?>


<section class="Contenido">
    <form action="VerifiedLogin" method="post" class="formulario" id="Login">
        <h2>Iniciar Sesion</h2>
        <label for="email">Correo electrónico</label>
        <input type="email" name="email" id="email" placeholder="example@example.com">
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña">
        <input type="submit" value="Iniciar sesión" class="boton_negro">
    </form>
</section>

<?php
if (isset($error)) {
    ?>
    <div class="modal">
        <div class="modal_contenido">
            <h2>Ocurrio un error durante el inicio de sesión</h2>
            <?php
            if ($error == 1) {
                echo "<p>-El usuario no está registrado</p>";
            }
            else {
                echo "<p>-La contraseña es incorrecta</p>";
            }
            ?>
            <button class="boton_negro btn_error">aceptar</button>
        </div>
    </div>
<?php
}
?>

<?php render('footer'); ?>