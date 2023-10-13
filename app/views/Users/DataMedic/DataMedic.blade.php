<?php render("header"); ?>
<?php

?>
<section class="Contenido">
    <h2> Informe de Datos Medicos Expedidos el dia {{ $InfMedic->getFecha_Historial() }}</h2>
    <form action="" class="datos_medicos">
      <span>Peso</span>
      <input type="text" name="peso" id="peso" placeholder="Kg" value="{{ $InfMedic->getPeso() }}" disabled>

      <span>Altura</span>
      <input type="text" name="altura" id="altura" placeholder="Cm" value="{{ $InfMedic->getAltura() }}" disabled>

      <span>Grupo sanguíneo</span>
      <input type="text" name="grupo_sanguineo" id="grupo_sanguineo" value="{{ $InfMedic->getGrupo_Sanguineo() }}" disabled>
      <select name="grupo_sanguineo" id="grupo_sanguineo" class="invisible">
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        <option value="A+">A+</option>
        <option value="A-">A-</option>
        <option value="B+">B+</option>
        <option value="B-">B-</option>
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
      </select>

      <span>Presión corporal</span>
      <input type="text" name="presion_corporal" id="presion_corporal" placeholder="mmHg" value="{{ $InfMedic->getPresion_Arterial() }}" disabled>

      <span>Nivel de glucosa</span>
      <input type="text" name="nivel_glucosa" id="nivel_glucosa" placeholder="mg/dL" value="{{ $InfMedic->getNivel_Glucosa() }}" disabled>

      <span>Incapacidades</span>
      <input type="text" name="" id="" value="{{ $InfMedic->getIncapacidades() }}" disabled>
      <select name="incapacidades" id="incapacidades" class="invisible">
        <option value="Ninguna">Ninguna</option>
        <option value="Movilidad reducida">Movilidad reducida</option>
        <option value="Discapacidad visual">Discapacidad visual</option>
        <option value="Discapacidad auditiva">Discapacidad auditiva</option>
        <option value="Discapacidad intelectual">Discapacidad intelectual</option>
        <option value="Otras">Otras</option>
      </select>

      <span>Notas</span>
      <textarea name="notas" id="notas" cols="50" rows="10" value="{{ $InfMedic->getNota() }}" placeholder="No hay notas" disabled></textarea>

    </form>
</section>

<?php render("footer"); ?>