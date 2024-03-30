{{ render("header") }}

<section class="w3-section w3-container w3-border">
    <h1>Seleccionar metodo de pago</h1>
    <div class="w3-container">
        <table class="w3-table w3-striped w3-bordered threeq-container">
            <tbody>
                @foreach($metodosP as $metodo)
                <tr>
                    <td>
                        Numero de tarjeta: {{$metodo->getNumero_Cuenta()}} &emsp; &emsp;
                        Titular:    {{$metodo->getNombre_Titular()}} &emsp; &emsp;
                        Vencimiento: {{$metodo->getVencimiento_Cuenta()}} &emsp; &emsp;
                        Saldo: {{$metodo->getSaldo()}}
                    </td>
                    <td><a href="/pagos/pagar/{{$id_pago}}/paciente/{{$id_paciente}}/metodo/{{$metodo->getID_InfoPago()}}"
                    class="w3-button w3-green w3-round">Seleccionar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@if(isset($error))
    <div class="w3-modal modal" style="display:block;">
        <div class="w3-modal-content w3-round-xlarge">
            <div class="w3-container w3-center">
                <h2 class="w3-xlarge">Ocurrio un error durante el inicio de sesión</h2>
                @if($error == 1)
                    <p>-El usuario no está registrado</p>
                @else
                    <p> -La contraseña es incorrecta</p>
                @endif
                <button class="btn_error w3-button w3-black w3-margin-bottom">aceptar</button>
            </div>
        </div>
    </div>
@endif

<script src="/{{ assets('js/error.js') }}"></script>
{{ render('footer') }}