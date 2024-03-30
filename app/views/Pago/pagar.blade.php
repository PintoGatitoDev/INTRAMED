{{ render("header") }}


<section class="w3-section w3-center half-container">
    <form action="/auth/login" method="post" class="w3-card-4 formulario w3-padding" id="Login">
        <input type="hidden" name="id_paciente" value="{{$id_paciente}}">
        <input type="hidden" name="id_saldo" value="{{$id_pago}}">
        <input type="hidden" name="id_metodo" value="{{$id_metodo}}">

        <label for="monto">Monto </label>
        <input type="number" name="monto" min="1" required>
        <input type="submit" value="Pagar" class="w3-button w3-blue w3-hover-pale-blue w3-margin-top">
        
    </form>
</section>


<script src="/{{ assets('js/error.js') }}"></script>
{{ render('footer') }}