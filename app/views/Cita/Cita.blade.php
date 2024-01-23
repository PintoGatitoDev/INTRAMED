<?php render('header');?>

<section class="w3-card-4 w3-margin-top w3-margin-left w3-margin-right w3-padding" >
    <h2 class="w3-center">Cita del: {{ $Datos_Cita['Fecha']}}</h2>

    <div class="w3-row w3-section">
        <span class="w3-col l6">Nombre del Medico: {{ $Datos_Cita['Nombre_Medico']}}</span>
        <span class="w3-col l6">Fecha De la Cita: {{ $Datos_Cita['Fecha']}}</span>
    </div>

    <div class="w3-row w3-section">
        <span class="w3-col l6">Nombre del Paciente: {{ $Datos_Cita['Nombre_Paciente']}}</span>
        <span class="w3-col l6">Hora Asignada: {{ $Datos_Cita['Hora']}}</span>
    </div>

    <div class="w3-row w3-section">
        <span class="w3-col l6">Correo de contacto del Medico: {{ $Datos_Cita['Correo_Medico']}}</span>
        <span class="w3-col l6">Correo de contacto del paciente: {{ $Datos_Cita['Correo_Paciente']}}</span>
    </div>

    <div class="w3-row w3-section">
        <span class="w3-col l6">Estado de la cita: {{ $Datos_Cita['Estado']}}</span>
        <span class="w3-col l6">Motivo de la cita: {{ $Datos_Cita['Servicio']}}</span>
    </div>

    <div class=" w3-container">
        @if(session()->get("Rol") != "Patient")
            @if($Datos_Cita['Estado'] == "Reservada")
                <a href="/citas/{{$Datos_Cita['ID_Cita']}}/agendarNueva/{{$Datos_Cita['ID_Paciente']}}" class="w3-button w3-blue">Agendar Nueva Cita</a>
                <a href="/citas/finalizar?id={{$Datos_Cita['ID_Cita']}}" class="w3-button w3-red">Finalizar</a>
            @endif
        @endif
    </div>
</section>

@if(isset($error))
    <div class="modal">
        <div class="modal_contenido">
            <h2>Ocurrio un error al agendar la cita</h2>
            <p>La cita acaba de ser reservada por alguien mas</p>
            <button class="boton_negro btn_error">aceptar</button>
        </div>
    </div>
@endif

{{ render('footer') }}