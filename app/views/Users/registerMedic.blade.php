<?php render('header');?>


<section class="Contenido">
    <form action="/auth/registerMedicBD" method="post" class="formulario" id="Login" enctype="multipart/form-data">
        <h2>Ingresa sus datos</h2>
        <input type="hidden" name="rol" id="rol" value="Medic" />
        <?php render("Users/formregister");?>
        <label for="Subrol">Subrol</label>
        <select name="Subrol" id="Subrol">
        <option value="" default>---Subrol---</option>
            <option value="General">General</option>
            <option value="Investigador">Investigador</option>
            <option value="Docente">Docente</option>
            <option value="Urgencias">Urgencias</option>
            <option value="Consulta">Consulta</option>
        </select>
        <label for="Nivel_Estudio">Nivel de estudio:</label>
        <input type="text" id="Nivel_Estudio" name="Nivel_Estudio" required>
        <label for="Experiencia_Medica">Experiencia médica (años):</label>
        <input type="number" id="Experiencia_Medica" name="Experiencia_Medica" min="0" required>
        <label for="area_trabajo">Área de trabajo</label>
        <select name="area_trabajo">
            <option value="habitacion_1">Habitación 1</option>
            <option value="habitacion_2">Habitación 2</option>
            <option value="habitacion_3">Habitación 3</option>
            <option value="habitacion_4">Habitación 4</option>
            <option value="habitacion_5">Habitación 5</option>
            <option value="consultorio_1">Consultorio 1</option>
            <option value="consultorio_2">Consultorio 2</option>
            <option value="consultorio_3">Consultorio 3</option>
            <option value="consultorio_4">Consultorio 4</option>
            <option value="consultorio_5">Consultorio 5</option>
            <option value="laboratorio_clinico">Laboratorio Clínico</option>
            <option value="laboratorio_patologico">Laboratorio Patológico</option>
            <option value="laboratorio_de_imagenes">Laboratorio de Imágenes</option>
            <option value="sala_de_emergencias">Sala de Emergencias</option>
            <option value="sala_de_operaciones">Sala de Operaciones</option>
            <option value="unidad_de_cuidados_intensivos">Unidad de Cuidados Intensivos</option>
            <option value="unidad_de_neonatologia">Unidad de Neonatología</option>
            <option value="unidad_de_oncologia">Unidad de Oncología</option>
            <option value="unidad_de_traumatologia">Unidad de Traumatología</option>
            <option value="unidad_de_medicina_interna">Unidad de Medicina Interna</option>
            <option value="unidad_de_ginecologia_y_obstetricia">Unidad de Ginecología y Obstetricia</option>
            <option value="unidad_de_pediatria">Unidad de Pediatría</option>
            <option value="unidad_de_medicina_familiar">Unidad de Medicina Familiar</option>
            <option value="unidad_de_prehospitalaria">Unidad de Prehospitalaria</option>
            <option value="unidad_de_investigacion">Unidad de Investigación</option>
            <option value="unidad_de_docencia">Unidad de Docencia</option>
            <option value="unidad_de_administracion">Unidad de Administración</option>
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
