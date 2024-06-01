<?php render("header"); ?>
<?php

?>
<section class="Contenido half-container w3-card-4 w3-padding">
    <form action="/user/{{$id_paciente}}/addInfMedic" method="post" class="formulario">
        <h2>Agregar metodo de pago</h2>
        <div class="campo">
      <label for="peso" class="w3-margin-top text-left">Peso</label>
      <input type="number" name="peso" id="peso" class="w3-input" placeholder="Kg">
    </div>

    <div class="campo">
      <label for="altura" class="w3-margin-top text-left">Altura</label>
      <input type="number" name="altura" id="altura" class="w3-input" placeholder="Cm">
    </div>

    <div class="campo">
      <label for="grupo_sanguineo" class="w3-margin-top text-left">Grupo sanguíneo</label>
      <select name="grupo_sanguineo" id="grupo_sanguineo" class="w3-select">
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
      </select>
    </div>

    <div class="campo">
      <label for="presion_corporal"class="w3-margin-top text-left">Presión corporal</label>
      <input type="number" name="presion_corporal" id="presion_corporal" placeholder="mmHg" class="w3-input">
    </div>

    <div class="campo">
      <label for="nivel_glucosa" class="w3-margin-top text-left">Nivel de glucosa</label>
      <input type="number" name="nivel_glucosa" id="nivel_glucosa" placeholder="mg/dL" class="w3-input">
    </div>

    <div class="campo">
      <label for="incapacidades" class="w3-margin-top text-left">Incapacidades</label>
      <select name="incapacidades" id="incapacidades" class="w3-select">
        <option value="Ninguna">Ninguna</option>
        <option value="Movilidad reducida">Movilidad reducida</option>
        <option value="Discapacidad visual">Discapacidad visual</option>
        <option value="Discapacidad auditiva">Discapacidad auditiva</option>
        <option value="Discapacidad intelectual">Discapacidad intelectual</option>
        <option value="Otras">Otras</option>
      </select>
    </div>

    <div class="campo">
      <label for="notas" class="w3-margin-top text-left">Notas</label>
      <textarea name="notas" id="notas" cols="50" rows="10" placeholder="Agrega cualquier nota adicional" class="w3-input"></textarea>
    </div>

        <input type="submit" class=" w3-margin-top w3-button w3-blue" value="Agregar">
    </form>
</section>

<?php render("footer"); ?>