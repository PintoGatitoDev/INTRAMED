<?php render('header');?>


<section class="w3-section w3-center">
    <form action="/auth/registerData" method="post" class="w3-card-4 formulario w3-padding" id="Register">
        <h2>Elije el rol de la persona</h2>
        <label for="rol" class="w3-left">Rol:</label>
        <select name="rol" id="rol" class="w3-select w3-margin-bottom">
            <option value="Admin">Administrador</option>
            <option value="Medic">Medico</option>
            <option value="Patient">Paciente</option>
        </select>
        <input type="submit" value="Continuar" class="w3-button w3-black w3-round">
    </form>
</section>



<?php render('footer');?>