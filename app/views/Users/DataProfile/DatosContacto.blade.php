<h2>Datos De contacto {{ $rol }}</h2>
    <div>
    <form action="/User/{{ $id_user }}/EditInfContacto" method="POST" class="form_edit">
        <p>
            <div class="left"><span>Telefono: </span>
                <input type="text" id="Telefono" name="Telefono" value="{{ $telefono }}" disabled class="editC">
            </div>

            <div class="center"><span>Dirección: </span>
                <input type="text" id="Direccion" name="Direccion" value="{{ $direccion }}" disabled class="editC">
            </div>
        </p>
        <input type="hidden" name="Rol" id="Rol" value="{{ $rol }}">
        <p>
            <?php
            if($rol == "Patient")
            { ?>
            <div class="center"><span>numero_Emergencia: </span>
                <input type="text" id="numero_Emergencia" name="numero_Emergencia"
                    value="{{ $dataC['numero_Emergencia'] }}" disabled class="editC">
            </div>
            <?php } ?>
        </p>

            <a href="#" class="bvisible" id="editcontacto">Editar Datos</a>
            <input type="submit" value="Actualizar" class="binvisible" id="guardar">
            <a href="#" class="binvisible" id="cancelarC">Cancelar</a>
    </form>
    </div>