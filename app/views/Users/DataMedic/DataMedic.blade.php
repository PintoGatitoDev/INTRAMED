{{ render("header"); }}

<section class="Contenido w3-card-4 threeq-container">
    <h2> Informe de Datos Medicos Expedidos el dia {{ $InfMedic->getFecha_Historial() }}</h2>
      <div class="half-container">
        <p><span>Peso:</span> {{ $InfMedic->getPeso() }}</p>
        <p><span>Altura:</span> {{ $InfMedic->getAltura() }}</p>
        <p><span>Grupo sanguíneo:</span> {{ $InfMedic->getGrupo_Sanguineo() }}</p>
        <p><span>Presión corporal:</span> {{ $InfMedic->getPresion_Arterial() }}</p>
        <p><span>Nivel de glucosa:</span> {{ $InfMedic->getNivel_Glucosa() }}</p>
        <p><span>Incapacidades:</span> {{ $InfMedic->getIncapacidades() }}</p>
        <p><span>Notas:</span> {{ $InfMedic->getNota() }}</p>
      </div>
      <div class="half-container ">
        <div class="w3-blue" width="300px" height="300px">
          <img src="/{{assets('img/app/Logo.png')}}" alt="Logo" width="300px">
        </div>
      </div>

</section>

<?php render("footer"); ?>