<?php render('header');?>

<link rel="stylesheet" href="/{{ assets('css/style.css') }}">

<section class="w3-container w3-center">
    <form action="/Citas/reservar" action="POST" class="formulario w3-card-4 w3-margin-top w3-padding">
        <h3>Reservar Nueva Cita</h3>
        <label for="servicio" class="w3-left">Elija el servicio al que desee reservar una cita:</label>
        <select name="servicio" id="servicio" class="w3-select">
            @foreach($servicios as $servicio)
                <option value="{{$servicio->getID_Servicio()}}">{{ $servicio->getNombre()}} - Costo {{ $servicio->getCosto()}} $</option>
            @endforeach
        </select>

        <div class="calendar">
            <table>
              <thead>
                <tr>
                  <td colspan="1">
                    <span id="ant"><</span>
                  </td>
                  <td colspan="5">
                    <h3 id="Emes">Diciembre</h3>
                    <p style="display: none;" id="Pmes"></p>
                    <p style="display: none;" id="Panio"></p>
                  </td>
                  <td colspan="1">
                    <span id="sig">></span>
                  </td>
                </tr>
                <tr><th>L</th><th>M</th><th>M</th><th>J</th><th>V</th><th>S</th><th>D</th></tr>
              </thead>
              <tbody id="cal_body">

              </tbody>
            </table>
        </div>

        <label for="fecha"  class="w3-left">Fecha seleccionada:</label>
        <input type="text" name="fecha" id="fecha" value="" class="w3-input" disabled>

        <input type="text" name="id_medico" id="id_medico" value="1">


        <label for="horario">Selecciona un horario:</label>
        <select name="horario" id="horario">

        </select>

        <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->getId_patient()}}">
        <input type="submit" value="Reservar">
    </form>
</section>


<script src="/{{assets('js/calendar.js')}}"></script>


<?php render('footer');?>