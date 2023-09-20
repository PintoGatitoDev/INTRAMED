<?php render('header'); ?>


<section class="Contenido">
    <form action="registerMedicBD" method="post" class="formulario" id="Login">
        <h2>Ingresa sus datos</h2>
        <input type="hidden" name="rol" id="rol" value="Admin" />
        <?php render("Users/formregister");?>
        <label for="Subrol">Subrol</label>
        <select name="Subrol" id="Subrol">
            <option value="" default>---Subrol---</option>
            <option value="General">General</option>
            <option value="Financiero">Investigador</option>
            <option value="Clinicos">Docente</option>
            <option value="Operaciones">Urgencias</option>
            <option value="Recursos">Consulta</option>
        </select>
        <label for="Nivel_Estudio">Nivel de estudio:</label>
        <input type="text" id="Nivel_Estudio" name="Nivel_Estudio" required>
        <label for="Experiencia_Medica">Experiencia médica (años):</label>
        <input type="number" id="Experiencia_Medica" name="Experiencia_Medica" min="0" required>

        <input type="submit" value="Enviar">
    </form>
</section>

<?php render('footer'); ?>