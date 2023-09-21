<h2>Datos Personales</h2>
<div id="DatoT">
    <p>
        <div class="left"><span>Nombre:</span>{{ $nombre }}</div>
        <div class="center"><span>Apellido Paterno:</span>{{ $apellido_p }}</div>
        <div class="right"><span>Apellido Materno:</span>{{ $apellido_m }}</div>
    </p>

    <p>
        <div class="left"><span>Fecha dado de alta:</span>{{ $fecha_alta}}</div>
        <div class="center"><span>Hora dado de alta:</span>{{ $hora_alta}}</div>
    </p>

    <p>
        <div class="left"><span>Fecha de Nacimiento:</span></div>
        <div class="center"><span>Edad:</span></div>
        <div class="right"><span>Genero:</span>{{ $genero }}</div>
    </p>

    <a href="#">Editar Datos</a>
</div>
<div id="DivFoto"></div>