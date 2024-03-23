{{ render("header") }}

<section class="w3-section w3-border w3-padding w3-round-large w3-light-grey half-container">
    <h2>¡Nos complace darte la bienvenida como administrador de INTRAMED!</h2>

        <p class="text-left">
            En nombre del equipo del Sistema Web Hospitalario, le damos una cordial bienvenida a nuestra plataforma. <br>
            Nos complace tenerle como usuario administrador y esperamos que esta herramienta le facilite la gestión de su trabajo en el hospital.
        </p>
        
        
        
        <p>Para acceder al panel de administración, utiliza el siguiente código de acceso evite perderlo:</p>

        <p><b>{{ $code }}</b></p>

        <a href="/auth/login" class="w3-button w3-border w3-light-blue w3-hover-white">Iniciar Sesión</a>
</section>

{{ render('footer') }}