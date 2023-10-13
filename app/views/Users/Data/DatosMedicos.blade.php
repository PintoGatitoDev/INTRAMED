<section class="Opciones">
    <h2 class="center">Datos Medicos</h2>
    <a href="/User/{{$id_paciente}}/FormInfMedic" class="right">Generar Nueva Informacion</a>
</section>
<div <div class="tabla">

    <table class="TDatos">
        <thead>
            <tr>
                <th>Información</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($datos_Medicos as $dato){
            ?>
            <tr>
                <td>
                    {{ $dato->getFecha_Historial() }}
                </td>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="/User/InfMedic/{{ $dato->getID_Dato() }}" class="btn_opciones">Consultar</a>
                                </td>
                                <td>
                                    <a href="/User/DelInfMedic/{{ $dato->getID_Dato() }}" class="btn_opciones">Borrar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>

</div>