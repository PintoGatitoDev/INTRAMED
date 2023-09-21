<?php render('header'); ?>


<section class="Contenido">
    <form action="registerPatientBD" method="post" class="formulario" id="Login">
        <h2>Ingresa sus datos</h2>
        <input type="hidden" name="rol" id="rol" value="Patient" />
        <?php render("Users/formregister");?>

        <label for="estado-civil">Estado civil</label>
        <select id="estado-civil" name="estado-civil">
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
            <option value="divorciado">Divorciado</option>
            <option value="viudo">Viudo</option>
        </select>

        <label for="genero">Género</label>
        <select id="genero" name="genero">
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
        </select>

        <input type="submit" value="Enviar">
    </form>
</section>

<?php render('footer'); ?>