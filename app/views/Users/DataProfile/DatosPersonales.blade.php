<div id="DivDatosP" class="DatosProfile threeq-container">
    <h2>Datos Personales
        @if ($rol == "Patient")
        Paciente
        @elseif ($rol == "Medic")
        Medico
        @else
        Administrador
        @endif
    </h2>
    <form action="/User/{{ $id_user }}/EditInfPersonal" method="POST" class="">
        <p>
        <div class="left"><span>Nombre: </span>
            <input type="text" id="Nombre" name="Nombre" value="{{ $nombre }}" disabled class="editP">
        </div>

        <div class="center"><span>Apellido Paterno: </span>
            <input type="text" id="ApellidoPaterno" name="ApellidoPaterno" value="{{ $apellido_p }}" disabled
                class="editP">
        </div>

        </p>

        <p>
        <div class="left"><span>Apellido Materno: </span>
            <input type="text" id="ApellidoMaterno" name="ApellidoMaterno" value="{{ $apellido_m }}" disabled
                class="editP">
        </div>
        <div class="center"><span>Fecha de Nacimiento: </span>
            <input type="date" id="Fecha_Nac" name="Fecha_Nac" value="{{ $fecha_nac }}" disabled class="editP">
        </div>

        </p>

        <p>

        <div class="left">
            <div class="visible"><span>Fecha dado de alta: </span>{{ $fecha_alta}}</div>
        </div>
        <div class="center">
            <div class="visible"><span>Hora dado de alta: </span>{{ $hora_alta}}</div>
        </div>
        </p>
        <input type="hidden" name="Rol" id="Rol" value="{{ $rol }}">

        <?php
    if(isset($data["estado_civil"]))
    {
    ?>
        <p>
        <div class="left"><span>Genero: </span>{{ $genero }}</div>
        <div class="center"><span>Estado Civil: </span>
            <div class="visible">{{ $data['estado_civil']}}</div>
        </div>
        <select id="estado-civil" name="estado-civil" class="invisible">
            <option value="soltero">Soltero</option>
            <option value="casado">Casado</option>
            <option value="divorciado">Divorciado</option>
            <option value="viudo">Viudo</option>
        </select>
        </p>

        <?php
    }
    else {
        ?>
        <p>
            <?php
                if($rol == "Admin")
                { ?>
        <div class="left"><span>Subrol: </span>
            <div class="visible">{{ $data['subrol']}}</div>
            <select name="Subrol" id="Subrol" class="invisible">
                <option value="General" default>General</option>
                <option value="Financiero">Financiero</option>
                <option value="Clinicos">Clinicos</option>
                <option value="Operaciones">Operaciones</option>
                <option value="Recursos">Recursos Humanos</option>
            </select>
        </div>
        <?php }
        else { ?>
        <div class="left"><span>Subrol: </span>
            <div class="visible">{{ $data['subrol']}}</div>
            <select name="Subrol" id="Subrol" class="invisible">
                <option value="" default>---Subrol---</option>
                <option value="General">General</option>
                <option value="Investigador">Investigador</option>
                <option value="Docente">Docente</option>
                <option value="Urgencias">Urgencias</option>
                <option value="Consulta">Consulta</option>
            </select>
        </div>

        <div class="right"> <span>Area de trabajo:</span>
            <div class="visible">{{ $data['area_Trabajo']}}</div>
            <select name="area_trabajo" class="invisible">
                <option value="habitacion_1">Habitación 1</option>
                <option value="habitacion_2">Habitación 2</option>
                <option value="habitacion_3">Habitación 3</option>
                <option value="habitacion_4">Habitación 4</option>
                <option value="habitacion_5">Habitación 5</option>
                <option value="consultorio_1">Consultorio 1</option>
                <option value="consultorio_2">Consultorio 2</option>
                <option value="consultorio_3">Consultorio 3</option>
                <option value="consultorio_4">Consultorio 4</option>
                <option value="consultorio_5">Consultorio 5</option>
                <option value="laboratorio_clinico">Laboratorio Clínico</option>
                <option value="laboratorio_patologico">Laboratorio Patológico</option>
                <option value="laboratorio_de_imagenes">Laboratorio de Imágenes</option>
                <option value="sala_de_emergencias">Sala de Emergencias</option>
                <option value="sala_de_operaciones">Sala de Operaciones</option>
                <option value="unidad_de_cuidados_intensivos">Unidad de Cuidados Intensivos</option>
                <option value="unidad_de_neonatologia">Unidad de Neonatología</option>
                <option value="unidad_de_oncologia">Unidad de Oncología</option>
                <option value="unidad_de_traumatologia">Unidad de Traumatología</option>
                <option value="unidad_de_medicina_interna">Unidad de Medicina Interna</option>
                <option value="unidad_de_ginecologia_y_obstetricia">Unidad de Ginecología y Obstetricia</option>
                <option value="unidad_de_pediatria">Unidad de Pediatría</option>
                <option value="unidad_de_medicina_familiar">Unidad de Medicina Familiar</option>
                <option value="unidad_de_prehospitalaria">Unidad de Prehospitalaria</option>
                <option value="unidad_de_investigacion">Unidad de Investigación</option>
                <option value="unidad_de_docencia">Unidad de Docencia</option>
                <option value="unidad_de_administracion">Unidad de Administración</option>
            </select>
        </div>
        <?php }
            ?>
        </p>
        <?php
        
    }
?>

        <a href="#" class="bvisible" id="editpersonales">Editar Datos</a>
        <input type="submit" value="Actualizar" class="binvisible" id="guardar">
        <a href="#" class="binvisible" id="cancelarP">Cancelar</a>
    </form>
</div>
<div id="DivFoto" class="quarter-container">
    <img src="/{{ $foto }}" alt="Photo">
</div>