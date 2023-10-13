<section class="Opciones">
    <h2 class="center">Datos De Pago</h2>
    <a href="/User/{{$id_paciente}}/FormInfPago" class="right">Nuevo Metodo</a>
</section>
<div class="tabla">

    <table class="TDatos">
        <thead>
            <tr>
                <th>Información</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($Pagos as $pago) {
                ?>
            <tr>
                <td>
                    <table>
                        <thead>
                            <tr>
                                <th>Numero de cuenta</th>
                                <th>Forma de cuenta</th>
                                <th>Nombre titular</th>
                                <th>Vencimiento</th>
                                <th>Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $pago->getNumero_Cuenta() }}</td>
                                <td>{{ $pago->getForma_Cuenta() }}</td>
                                <td>{{ $pago->getNombre_Titular() }}</td>
                                <td>{{ $pago->getVencimiento_Cuenta() }}</td>
                                <td>{{ $pago->getSaldo() }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="/User/{{ $pago->getID_InfoPago()}}/DelInfPago" class="btn_opciones">Borrar</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <?php
                }
            ?>
        </tbody>
    </table>

</div>