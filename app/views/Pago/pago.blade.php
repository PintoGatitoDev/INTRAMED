{{ render("header") }}


<section class="w3-section w3-center threeq-container">
    <div class="w3-container w3-border text-left">
        <h2 class="text-center">Detalles del Pago</h2>
            <p>Motivo: {{$datosCita["Servicio"]}}</p>
            <p>Nombre del doctor: {{$datosCita["Nombre_Medico"]}}</p>
            <p>Nombre del paciente: {{$datosCita["Nombre_Paciente"]}}</p>
            <p>Fecha Emitida del formato de Pago: {{$pago->getFecha_Emitida()}}</p>
            <p>Hora Emitida del formato de Pago: {{$pago->getHora_Emitida()}}</p>
            <p>Hospital: INTRAMED</p>
            <p>Fecha Limite de Pago: {{$pago->getFecha_Limite()}}</p>
            <p>Estado: @if($pago->getEstado() == "Pagado")
                <span class="w3-green w3-padding">{{$pago->getEstado()}}</span>
                @else
                <span class="w3-red w3-padding">{{$pago->getEstado()}}</span>
                @endif
            </p>
            <p>Monto total: ${{$pago->getMonto()}}</p>
        <div class="w3-container w3-padding w3-right">
            <a href="/pagos/pagar/{{$pago->getID_Pago()}}/paciente/{{$datosCita["ID_Paciente"]}}" class="w3-button w3-round w3-green">Pagar</a>
        </div>
    </div>
</section>

{{ render('footer') }}