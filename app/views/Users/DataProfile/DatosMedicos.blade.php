<section class="Opciones">
    <h2 class="center">Reportes Medicos</h2>
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
                                    <a href="/User/InfMedic/{{ $dato->getID_Dato() }}"
                                        class="btn_opciones">Consultar</a>
                                </td>
                                <td>
                                    <a href="/User/DelInfMedic/{{ $dato->getID_Dato() }}"
                                        class="btn_opciones">Borrar</a>
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