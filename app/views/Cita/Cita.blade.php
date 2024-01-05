<?php render('header'); ?>

<?php
	var_dump($Datos_Cita);
?>

@if($_SESSION["Rol"] == "Medic")
		@if($Datos_Cita['Estado'] != "Finalizado")
            <a href="#">Agendar Nueva Cita</a>
            <a href="/Citas/Finalizar?id={{$Datos_Cita['ID_Cita']}}">Finalizar</a>
        @endif
@endif


@if(isset($error)) {
    ?>
    <div class="modal">
        <div class="modal_contenido">
            <h2>Ocurrio un error al agendar la cita</h2>
            <p>La cita acaba de ser reservada por alguien mas</p>
            <button class="boton_negro btn_error">aceptar</button>
        </div>
    </div>
@endif

<?php render('footer'); ?>