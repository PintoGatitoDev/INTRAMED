<?php render('header');?>


<section class="Contenido">
    <form action="/auth/registerAdminBD" method="post" class="formulario" id="Login" enctype="multipart/form-data">
        <h2>Ingresa sus datos</h2>
        <input type="hidden" name="rol" id="rol" value="Admin" />
        <?php render("Users/formregister");?>
        <label for="Subrol">Subrol</label>
        <select name="Subrol" id="Subrol">
            <option value="" default>---Subrol---</option>
            <option value="General">General</option>
            <option value="Financiero">Financiero</option>
            <option value="Clinicos">Clinicos</option>
            <option value="Operaciones">Operaciones</option>
            <option value="Recursos">Recursos Humanos</option>
        </select>
        <input type="submit" value="Registro">
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
<?php render('footer');?>