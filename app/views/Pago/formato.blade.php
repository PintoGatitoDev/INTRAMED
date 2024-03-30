{{ render("header") }}


<section class="w3-section w3-center threeq-container">
    <form action="/pagos/guardarFormato" method="post" class="w3-card-4 formulario w3-padding">
        <h2>Formato de Pago</h2>
        <input type="hidden" name="ID_Cita" value="{{$cita["ID_Cita"]}}">
        <input type="hidden" name="Fecha_Emitida" value="{{$fechaE}}">
        <input type="hidden" name="Hora_Emitida" value="{{$horaE}}">
        <input type="hidden" name="Fecha_Limite" value="{{$fechaL}}">
        <input type="hidden" name="ID_Paciente" value="{{$cita['ID_Paciente']}}">

        <p>Motivo: {{$servicio->getNombre()}}</p>
        <p>Nombre del doctor: {{$servicio->getNombre()}}</p>
        <p>Nombre del paciente: {{$servicio->getNombre()}}</p>
        <p>Fecha Emitida del formato: {{$servicio->getNombre()}}</p>
        <p>Hora Emitida del formato: {{$servicio->getNombre()}}</p>
        <p>Hospital: INTRAMED</p>
        <p>Fecha Limite de Pago: {{$servicio->getNombre()}}</p>
        <label for="Monto">Monto Total: $</label>
        <input type="text" name="Monto" value="{{ $servicio->getCosto()}}">
        <br>
        <label for="Cargos">Cargos Extra:</label>
        <textarea name="Cargos" id="Cargos" cols="30" rows="1"></textarea>
        <input type="submit" value="Confirmar">
        <a href="/citas/{{$cita["ID_Cita"]}}" class="w3-button w3-round w3-red">Cancelar</a>
    </form>
</section>

{{ render('footer') }}