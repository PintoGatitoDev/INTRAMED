<?php render('header');?>

<link rel="stylesheet" href="/{{ assets('css/style.css') }}">

<section class="w3-container w3-center">
		<form action="{{$ruta}}" method="post" class="formulario w3-card-4 w3-padding half-container">
				<h3>Reservar Nueva Cita</h3>
				<label for="servicio" class="w3-left">Elija el servicio al que desee reservar una cita:</label>
				<select name="servicio" id="servicio" class="w3-select">
						@foreach($servicios as $servicio)
								<option value="{{$servicio->getID_Servicio()}}">{{ $servicio->getNombre()}} - Costo {{ $servicio->getCosto()}} $</option>
						@endforeach
				</select>

				<div class="calendar w3-center w3-container w3-margin">
						<table>
							<thead class="w3-blue">
								<tr>
									<th colspan="1">
										<span id="ant" class="w3-hover-white w3-padding"><</span>
									</th>
									<th colspan="5">
										<h3 id="Emes">Diciembre</h3>
										<p style="display: none;" id="Pmes"></p>
										<p style="display: none;" id="Panio"></p>
									</th>
									<th colspan="1">
										<span id="sig" class="w3-hover-white w3-padding">></span>
									</th>
								</tr>
								<tr><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>
							</thead>
							<tbody id="cal_body">

							</tbody>
						</table>
				</div>

				<div class="w3-row">
					<label for="fecha"  class="w3-left w3-col s6 l6">Fecha seleccionada:</label>
					<input type="text" name="fecha" id="fecha" value="" class="w3-input w3-col s6 l6" readonly>
				</div>

				<label for="horario" class="w3-left">Selecciona un horario:</label>
				<select name="horario" id="horario" class="w3-select">
				</select>

				<input type="hidden" name="id_paciente" id="id_paciente" value="{{$paciente->getId_patient()}}">

				@if(isset($medic))
					<input type="hidden" name="id_medico" id="id_medico" value="{{$medic->getId_Medic()}}">
				@endif

				@if(isset($id_cita))
					<input type="hidden" name="id_cita" id="id_cita" value="{{$id_cita}}">
				@endif

				<input type="submit" value="Reservar" class="w3-button w3-margin-top w3-blue">
		</form>
</section>

<script src="/{{assets('js/calendar.js')}}"></script>


<?php render('footer');?>