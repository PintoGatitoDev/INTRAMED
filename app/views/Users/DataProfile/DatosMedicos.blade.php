<section class="Opciones w3-container w3-margin-bottom">
    <h2 class="center">Reportes Medicos</h2>
    <a href="/user/{{$id_paciente}}/addInfMedic" class="w3-button w3-blue">Agregar Nuevo</a>
</section>
<div class="tabla">
    <table class="w3-table w3-striped w3-bordered">
        <thead class="w3-blue">
            <tr>
                <th>Información</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datos_Medicos as $dato)
            <tr>
                <td>
                    {{ $dato->getFecha_Historial() }}
                </td>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="/user/{{$id_paciente}}/infMedic/{{ $dato->getID_Dato() }}"
                                        class="w3-button w3-blue">Consultar</a>
                                </td>
                                <td>
                                    <a href="/user/{{$id_paciente}}/delMedic/{{ $dato->getID_Dato() }}"
                                        class="w3-button w3-red">Borrar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>