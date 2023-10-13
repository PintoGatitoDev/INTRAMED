<?php render("header"); ?>
<?php

?>
<section class="Contenido">
    <form action="/User/{{$id_paciente}}/addInfMedic" method="post" class="formulario">
        <h2>Agregar metodo de pago</h2>
        <div class="campo">
      <label for="peso">Peso</label>
      <input type="number" name="peso" id="peso" placeholder="Kg">
    </div>

    <div class="campo">
      <label for="altura">Altura</label>
      <input type="number" name="altura" id="altura" placeholder="Cm">
    </div>

    <div class="campo">
      <label for="grupo_sanguineo">Grupo sanguíneo</label>
      <select name="grupo_sanguineo" id="grupo_sanguineo">
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
      <label for="presion_corporal">Presión corporal</label>
      <input type="number" name="presion_corporal" id="presion_corporal" placeholder="mmHg">
    </div>

    <div class="campo">
      <label for="nivel_glucosa">Nivel de glucosa</label>
      <input type="number" name="nivel_glucosa" id="nivel_glucosa" placeholder="mg/dL">
    </div>

    <div class="campo">
      <label for="incapacidades">Incapacidades</label>
      <select name="incapacidades" id="incapacidades">
        <option value="Ninguna">Ninguna</option>
        <option value="Movilidad reducida">Movilidad reducida</option>
        <option value="Discapacidad visual">Discapacidad visual</option>
        <option value="Discapacidad auditiva">Discapacidad auditiva</option>
        <option value="Discapacidad intelectual">Discapacidad intelectual</option>
        <option value="Otras">Otras</option>
      </select>
    </div>

    <div class="campo">
      <label for="notas">Notas</label>
      <textarea name="notas" id="notas" cols="50" rows="10" placeholder="Agrega cualquier nota adicional"></textarea>
    </div>

        <input type="submit" value="Agregar">
    </form>
</section>

<?php render("footer"); ?>