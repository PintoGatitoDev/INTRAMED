<?php render('header'); ?>


<section class="Contenido">
    <form action="registerAdminBD" method="post" class="formulario" id="Login" enctype="multipart/form-data">
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
        <input type="submit" value="Enviar">
    </form>
</section>

<?php render('footer'); ?>