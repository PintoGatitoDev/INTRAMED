<?php render('header'); ?>

<link rel="stylesheet" href="/{{ assets('css/style.css') }}">

<section class="contenedor">
    <form action="/Citas/reservar" action="POST" class="formulario">
        <h3>Reservar Nueva Cita</h3>
        <label for="servicio">Elija el servicio al que desee reservar una cita:</label>
        <select name="servicio" id="servicio">
            @foreach($servicios as $servicio)
                <option value="{{$servicio->getID_Servicio()}}">{{ $servicio->getNombre()}} - Costo {{ $servicio->getCosto()}} $</option>
            @endforeach
        </select>

        <div id="calendar">
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

        <input type="date" name="fecha" id="fecha">

        <input type="text" name="id_medico" id="id_medico" value="1">
        

        <label for="horario">Selecciona un horario:</label>
        <select name="horario" id="horario">
            <option value="08:00">8:00 AM</option>
            <option value="08:30">8:30 AM</option>
            <option value="09:00">9:00 AM</option>
            <option value="09:30">9:30 AM</option>
            <option value="10:00">10:00 AM</option>
            <option value="10:30">10:30 AM</option>
            <option value="11:00">11:00 AM</option>
            <option value="11:30">11:30 AM</option>
            <option value="12:00">12:00 PM</option>
            <option value="12:30">12:30 PM</option>
            <option value="13:00">1:00 PM</option>
            <option value="13:30">1:30 PM</option>
            <option value="14:00">2:00 PM</option>
            <option value="14:30">2:30 PM</option>
            <option value="15:00">3:00 PM</option>
            <option value="15:30">3:30 PM</option>
            <option value="16:00">4:00 PM</option>
            <option value="16:30">4:30 PM</option>
            <option value="17:00">5:00 PM</option>
            <option value="17:30">5:30 PM</option>
        </select>

        <input type="hidden" name="id_paciente" id="id_paciente" value="{{ $paciente->getId_patient()}}">
        <input type="submit" value="Reservar">
    </form>
</section>


<script src="/{{assets('js/calendar.js')}}"></script>


<?php render('footer'); ?>