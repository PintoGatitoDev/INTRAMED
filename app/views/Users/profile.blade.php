<?php render('header');?>

<section class="Main">
    <section id="perfilOpciones">

        <ul id="opcion">
            <li><a href="contenedor1">Datos Personales</a></li>
            <li><a href="contenedor2">Datos De contacto</a></li>
            <li><a href="contenedor3">Datos Medicos</a></li>
            <li><a href="contenedor4">Datos De Pago</a></li>
        </ul>

    </section>

    <section id="apartados">
        <div id="contenedor1">
            <?php 
    if($rol == "Patient")
    {
        $dataP = [
            "estado_civil" => $estado_civil,
            "NSS" => $NSS,
        ];
    }
    elseif ($rol == "Medic") {
        $dataP = [
            "subrol" => $subrol,
            "nivel_Estudio" => $nivel_Estudio,
            "experiencia" => $experiencia,
            "area_Trabajo" => $area_Trabajo
        ];
    }
    else {
        $dataP = [
            "subrol" => $subrol,
            "pass_Security" => $pass_Security
        ];
    }
    render('Users/Data/DatosPersonales',[
            "nombre" => $nombre,
            "apellido_p" => $apellido_p,
            "apellido_m" => $apellido_m,
            "fecha_alta" => $fecha_alta,
            "hora_alta" => $hora_alta,
            "genero" => $genero,
            "foto" => $foto,
            "fecha_nac" =>$fecha_nac,
            "data" => $dataP
        ]);?>

        </div>

        <div id="contenedor2" style="display: none;">
            <?php render('Users/Data/DatosContacto',[
        'direccion'=> $direccion,
        'telefono' => $telefono
    ]);?>
        </div>
        
        <div id="contenedor3" style="display: none;">
            <?php render('Users/Data/DatosMedicos');?>
        </div>

        <div id="contenedor4" style="display: none;">
            <?php render('Users/Data/DatosPago');?>
        </div>
    </section>
</section>



<?php render('footer');?>