{{ render("header") }}

<section class="w3-section w3-container w3-border">
    <h1>Informe de Pagos Realizados</h1>

    <div class="w3-container">
        <table class="w3-table w3-striped w3-bordered">
            <tbody>
                @foreach($pagos as $pago)
                <tr>
                    <td>
                        Fecha Expedida:{{$pago->getFecha_Emitida()}} &emsp; &emsp;
                        Fecha Pagada: @if($pago->getFecha_Pagada()) {{$pago->getFecha_Pagada()}} @else ------ @endif &emsp; &emsp;
                        ID de Cita: {{ $pago->getID_Cita()}}
                    </td>
                    <td><a href="/pagos/pagoRealizado/{{$pago->getID_Pago()}}">Detalles</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

{{ render('footer') }}