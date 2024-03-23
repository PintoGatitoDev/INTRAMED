{{ render('header') }}

    <form action="registerPatient" method="post" class="w3-card-4 half-container w3-padding" id="Login"
    enctype="multipart/form-data">
        <h2>Ingresa sus datos</h2>
        <input type="hidden" name="rol" id="rol" value="Patient" />

        {{ render("Users/formregister") }}
        
        <label for="estado-civil" class="w3-margin-top text-left">Estado civil</label>
        <select id="estado-civil" name="estado-civil" class="w3-select">
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
            <option value="divorciado">Divorciado</option>
            <option value="viudo">Viudo</option>
        </select>
        <label for="NSS" class="w3-margin-top text-left">NSS(Numero de seguro social(opcional))</label>
        <input type="text" id="NSS" name="NSS" placeholder="" class="w3-input">
        <label for="Num_Emergencia" class="w3-margin-top text-left">Numero de emergencia</label>
        <input type="text" id="Num_Emergencia" name="Num_Emergencia" placeholder="0000000000" class="w3-input">
        <input type="submit" value="Registrarse" class="w3-margin-top w3-button w3-blue">
    </form>


@if (isset($error))
<div class="modal">
    <div class="modal_contenido">
        <h2>Ocurrio un error durante el registro</h2>
                {{ "<p>-El correo ya a sido registrado</p>" }}
        <button class="boton_negro btn_error">aceptar</button>
    </div>
</div>
@endif

{{ render('footer') }}