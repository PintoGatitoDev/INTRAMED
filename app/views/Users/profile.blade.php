<?php render('header');?>

<section>
    
    <ul id="opcion">
        <li><a href="contenedor1">Datos Personales</a></li>
        <li><a href="contenedor2">Datos De contacto</a></li>
        <li><a href="contenedor3">Datos Medicos</a></li>
    </ul>
    
</section>

<section>
        <div id="contenedor1">
            <?php render('Users/Data/DatosPersonales',[
                "nombre" => $nombre,
                "apellido_p" => $apellido_p,
                "apellido_m" => $apellido_m,
                "fecha_alta" => $fecha_alta,
                "hora_alta" => $hora_alta,
                "genero" => $genero
            ]);?>
            
        </div>

        <div id="contenedor2" style="display: none;">
            <?php render('Users/Data/DatosContacto');?>
        </div>

        <div id="contenedor3" style="display: none;">
            <h1>Sección 3</h1>
            <p>Este es el contenido de la sección 3.</p>
            
        </div>
</section>



<?php render('footer');?>