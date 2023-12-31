<?php render('header'); ?>


<section class="Contenido">
    <form action="registerPatientBD" method="post" class="formulario" id="Login" enctype="multipart/form-data">
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
        <label for="NSS">NSS(Numero de seguro social(opcional))</label>
        <input type="text" id="NSS" name="NSS" placeholder="">
        <label for="Num_Emergencia">Numero de emergencia</label>
        <input type="text" id="Num_Emergencia" name="Num_Emergencia" placeholder="0000000000" value="0">
        <input type="submit" value="Registro" class="boton_negro">
    </form>
</section>

<?php
if (isset($error)) {
    ?>
    <div class="modal">
        <div class="modal_contenido">
            <h2>Ocurrio un error durante el registro</h2>
            <?php
                echo "<p>-El correo ya a sido registrado</p>";
            ?>
            <button class="boton_negro btn_error">aceptar</button>
        </div>
    </div>
<?php
}
?>

<?php render('footer'); ?>