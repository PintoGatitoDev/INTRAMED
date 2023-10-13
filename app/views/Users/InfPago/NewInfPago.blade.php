<?php render("header"); ?>
<?php

?>
<section class="Contenido">
    <form action="/User/{{$id_paciente}}/addInfPago" method="post" class="formulario">
        <h2>Agregar metodo de pago</h2>
        <label for="numero_tarjeta">Número de Tarjeta</label>
        <input type="text" name="numero_tarjeta" id="numero_tarjeta" placeholder="Número de tarjeta" required minlength="14" pattern="^[0-9]+$">

        <label for="forma_cuenta">Forma de pago</label>
        <select name="forma_cuenta" id="forma_cuenta">
            <option value="tarjeta_de_credito">Tarjeta de crédito</option>
            <option value="tarjeta_de_debito">Tarjeta de débito</option>
            <option value="paypal">PayPal</option>
            <option value="transferencia_bancaria">Mercado Pago</option>
            <option value="otros">Otros</option>
        </select>

        <label for="nombre_titular">Nombre del titular</label>
        <input type="text" name="nombre_titular" id="nombre_titular" placeholder="Nombre del titular" required>

        <label for="vencimiento">Fecha de vencimiento</label>
        <input type="date" name="vencimiento" id="vencimiento" placeholder="Fecha de vencimiento" required>

        <label for="saldo">Saldo</label>
        <input type="number" name="saldo" id="saldo" placeholder="Saldo">
        <input type="hidden" name="id_paciente" id="id_paciente" value="{{$id_paciente}}" required pattern="^[0-9]+$">
        <input type="submit" value="Agregar">
    </form>
</section>

<?php render("footer"); ?>