{{ render('header') }}

<form action="/auth/registerAdmin" method="post" class="w3-card-4 half-container w3-padding" id="Login"
    enctype="multipart/form-data">

    <h2>Ingresa sus datos</h2>
    <input type="hidden" name="rol" id="rol" value="Admin" />

    {{ render("Users/formregister") }}

    <label for="Subrol" class="w3-margin-top text-left">Subrol</label>
    <select name="Subrol" id="Subrol" class="w3-select">
        <option value="" default>---Subrol---</option>
        <option value="General">General</option>
        <option value="Financiero">Financiero</option>
        <option value="Clinicos">Clinicos</option>
        <option value="Operaciones">Operaciones</option>
        <option value="Recursos">Recursos Humanos</option>
    </select>
    <input type="submit" value="Registrarse" class="w3-margin-top w3-button w3-blue">
</form>



@if(isset($error))
    <div class="w3-modal modal" style="display:block;">
        <div class="w3-modal-content w3-round-xlarge">
            <div class="w3-container w3-center">
                <h2 class="w3-xlarge">Ocurrio un error durante el Registro</h2>
                @if($error == 1)
                    <p>-El correo ya a sido registrado</p>
                @endif
                <button class="btn_error w3-button w3-black w3-margin-bottom">aceptar</button>
            </div>
        </div>
    </div>
@endif

<script src="/{{ assets('js/error.js') }}"></script>
{{ render('footer') }}