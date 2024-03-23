<?php render('header');?>

<div class="w3-container">
    <h2 class="w3-center">Mis Citas</h2>
    <table class="w3-table-all w3-centered">
        <thead>
            <tr>

                <th colspan="2">Descripción</th>
                <th >Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Citas as $cita)
                <tr>
                    <td>Fecha Programada: {{ $cita->getFecha() }}</td>
                    <td>Hora: {{ $cita->getHora() }}</td>
                    <td> <a href="/citas/{{$cita->getId_Cita()}}" class="w3-button w3-green w3-round-xlarge">Detalles</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<?php render('footer');?>