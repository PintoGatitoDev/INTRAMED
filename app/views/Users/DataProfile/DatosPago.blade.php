<section class="Opciones">
    <h2 class="center">Metodos De Pago</h2>
    <a href="/user/{{$id_paciente}}/NewInfPago" class="w3-button w3-blue w3-round">Nuevo Metodo</a>
</section>
<div class="tabla">

    <table class="w3-table w3-striped w3-bordered">
        <thead>
            <tr>
                <th>Información</th>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Pagos as $pago)
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
                                <td>{{ $pago->getSaldo() }} $</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td>
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="/User/{{ $pago->getID_InfoPago()}}/DelInfPago" class="w3-button w3-red w3-round w3-padding">Borrar</a>
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