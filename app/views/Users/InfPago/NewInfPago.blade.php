{{ render("header") }}

<form action="/user/{{$id_paciente}}/addInfPago" method="post" 
    class="w3-section w3-center half-container w3-border w3-padding w3-round">

    <h2>Agregar metodo de pago</h2>

    <label for="numero_tarjeta" class="w3-margin-top text-left">Número de Tarjeta</label>
    <input type="text" name="numero_tarjeta" id="numero_tarjeta" placeholder="Número de tarjeta" required minlength="14"
        pattern="^[0-9]+$" class="w3-input">

    <label for="forma_cuenta" class="w3-margin-top text-left">Forma de pago</label>
    <select name="forma_cuenta" id="forma_cuenta" class="w3-select">
        <option value="tarjeta_de_credito">Tarjeta de crédito</option>
        <option value="tarjeta_de_debito">Tarjeta de débito</option>
        <option value="paypal">PayPal</option>
        <option value="transferencia_bancaria">Mercado Pago</option>
        <option value="otros">Otros</option>
    </select>

    <label for="nombre_titular" class="w3-margin-top text-left">Nombre del titular</label>
    <input type="text" name="nombre_titular" id="nombre_titular" placeholder="Nombre del titular" class="w3-input" required>

    <label for="vencimiento" class="w3-margin-top text-left">Fecha de vencimiento</label>
    <input type="date" name="vencimiento" id="vencimiento" placeholder="Fecha de vencimiento" required>

    <label for="saldo" class="w3-margin-top text-left">Saldo</label>
    <input type="number" name="saldo" id="saldo" placeholder="100" class="w3-input">

    <input type="hidden" name="id_paciente" id="id_paciente" value="{{$id_paciente}}" required pattern="^[0-9]+$">
    <input type="submit" value="Agregar" class="w3-button w3-blue w3-hover-pale-blue w3-margin-top">
</form>

{{ render('footer') }}