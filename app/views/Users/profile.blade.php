{{ render("header") }}

<section class="profile w3-container">
    <section class="Apartados quarter-container">

        <ul id="opcion">
            <li><a href="contenedor1">Datos Personales</a></li>
            <li><a href="contenedor2">Datos De contacto</a></li>
            <?php
            if($rol == "Patient")
            { ?>
            <li><a href="contenedor3">Datos Medicos</a></li>
            <li><a href="contenedor4">Datos De Pago</a></li>
            <?php 
            }

            if($rol == "Patient")
            {
                $dataP = [
                    "estado_civil" => $estado_civil,
                    "NSS" => $NSS,
                ];
                $dataC = [
                    "numero_Emergencia" => $numero_Emergencia
                ];
            }
            elseif ($rol == "Medic") {
                $dataP = [
                    "subrol" => $subrol,
                    "nivel_Estudio" => $nivel_Estudio,
                    "experiencia" => $experiencia,
                    "area_Trabajo" => $area_Trabajo
                ];
                $dataC = [];
            }
            else {
                $dataP = [
                    "subrol" => $subrol,
                    "pass_Security" => $pass_Security
                ];
                $dataC = [];
            }
            ?>
        </ul>
    </section>


    <section class="InfProfile threeq-container w3-padding">
        <div id="contenedor1" style="display: block;">
            <?php 
            render('Users/DataProfile/DatosPersonales',[
                    "id_user" => $id_user,
                    "nombre" => $nombre,
                    "apellido_p" => $apellido_p,
                    "apellido_m" => $apellido_m,
                    "fecha_alta" => $fecha_alta,
                    "hora_alta" => $hora_alta,
                    "genero" => $genero,
                    "foto" => $foto,
                    "fecha_nac" =>$fecha_nac,
                    "data" => $dataP,
                    "rol" => $rol,
                ]);
            ?>

        </div>

        <div id="contenedor2" style="display: none;">
            <?php render('Users/DataProfile/DatosContacto',[
                "id_user" => $id_user,
                'direccion'=> $direccion,
                'telefono' => $telefono,
                "dataC" => $dataC,
                "rol" => $rol
    ]);?>
        </div>

        <?php
        if($rol == "Patient")
        {?>
        <div id="contenedor3" style="display: none;">
            <?php render('Users/DataProfile/DatosMedicos',[
                "id_paciente" => $id_paciente,
                "datos_Medicos" => $datos_Medicos
            ]);?>
        </div>

        <div id="contenedor4" style="display: none;">
            <?php render('Users/DataProfile/DatosPago',[
                "id_paciente" => $id_paciente,
                "Pagos" => $Pagos
            ]);?>
        </div>
        <?php
        }
    ?>
    </section>
</section>


<script src="/{{ assets('js/apartados.js') }}"></script>
<?php render('footer');?>