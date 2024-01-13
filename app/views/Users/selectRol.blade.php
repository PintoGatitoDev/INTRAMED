<?php render('header');?>


<section class="Contenido">
    <form action="/auth/registerData" method="post" class="formulario" id="Register">
        <h2>Elije el rol de la persona</h2>
        <label for="rol">Rol</label>
        <select name="rol" id="rol">
            <option value="" default>---Rol---</option>
            <option value="Admin">Administrador</option>
            <option value="Medic">Medico</option>
            <option value="Patient">Paciente</option>
        </select>
        <input type="submit" value="Continuar" class="boton_negro">
    </form>
</section>



<?php render('footer');?>