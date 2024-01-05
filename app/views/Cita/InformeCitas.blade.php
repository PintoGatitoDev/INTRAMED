<?php render('header'); ?>

<div>
    
        <div class="Cita">
            <table>
                <thead>
                <tr>

                    <th class="firt" colspan="2">Descripción</th>
                    <th class="second">Opciones</th>
                </tr>
                </thead>
                <tbody>
	                @foreach($Citas as $cita)
	                <tr>
	                    <td>Fecha: {{ $cita->getFecha() }}</td>
	                    <td>Hora: {{ $cita->getHora() }}</td>
	                    <td> <a href="/Citas/{{$cita->getId_Cita()}}">Detalles</a> </td>
	                </tr>
	                @endforeach
                </tbody>
            </table>
        </div>
    
</div>


<?php render('footer'); ?>