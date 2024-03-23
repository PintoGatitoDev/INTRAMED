{{ render("header") }}


<section class="w3-section w3-center half-container">
    <form action="/auth/login" method="post" class="w3-card-4 formulario w3-padding" id="Login">
        <h2>Iniciar Sesión</h2>
        <label for="email" class="w3-margin-top text-left">Correo electrónico</label>
        <input type="email" name="email" id="email" placeholder="example@example.com"  class="w3-input" >

        <label for="password" class="w3-margin-top text-left">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Ingrese su contraseña" class="w3-input">

        <input type="submit" value="Iniciar sesión" class="w3-button w3-blue w3-hover-pale-blue w3-margin-top">
    </form>
</section>


@if(isset($error))
    <div class="w3-modal modal" style="display:block;">
        <div class="w3-modal-content w3-round-xlarge">
            <div class="w3-container w3-center">
                <h2 class="w3-xlarge">Ocurrio un error durante el inicio de sesión</h2>
                @if($error == 1)
                    <p>-El usuario no está registrado</p>
                @else
                    <p> -La contraseña es incorrecta</p>
                @endif
                <button class="btn_error w3-button w3-black w3-margin-bottom">aceptar</button>
            </div>
        </div>
    </div>
@endif


<script src="/{{ assets('js/error.js') }}"></script>
{{ render('footer') }}