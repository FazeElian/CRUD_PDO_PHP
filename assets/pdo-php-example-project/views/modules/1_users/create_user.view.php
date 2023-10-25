<form action="" method="post">
    <div class="form-header">
        <h1>Crear Usuario</h1>
    </div>
    <div class="form-body">
        <div class="form-control">
            <label for="rolCode">Rol</label>
            <select name="rolCode" id="rolCode">
                <option value="3">seller</option>
                <option value="2">customer</option>
                <option value="1">admin</option>
            </select>
        </div>
        <div class="form-control">
            <label for="userCode">Código</label>
            <input type="text" name="userCode" id="userCode" placeholder="Código Usuario">
        </div>
        <div class="form-control">
            <label for="userId">Identificación</label>
            <input type="number" name="userId" id="userId" placeholder="Identificación">
        </div>
        <div class="form-control">
            <label for="userName">Nombres</label>
            <input type="text" name="userName" id="userName" placeholder="Nombres">
        </div>
        <div class="form-control">
            <label for="userLastName">Apellidos</label>
            <input type="text" name="userLastName" id="userLastName" placeholder="Apellidos">
        </div>
        <div class="form-control">
            <label for="userEmail">Email</label>
            <input type="email" name="userEmail" id="userEmail" placeholder="Email">
        </div>
        <div class="form-control">
            <label for="userPhone">Celular</label>
            <input type="text" name="userPhone" id="userPhone" placeholder="Celular">
        </div>
        <div class="form-control">
            <label for="userPass">Contraseña</label>
            <input type="password" name="userPass" id="userPass" placeholder="Contraseña">
        </div>
        <div class="form-control">
            <label for="userConfirmPass">Confirmación</label>
            <input type="password" name="userConfirmPass" id="userConfirmPass" placeholder="Confirmación">
        </div>
        <div class="form-control">
            <label for="userStatus">Estado</label>
            <select name="userStatus" id="userStatus">                
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
    </div>
    <div class="form-footer">
        <input type="submit" value="Enviar">
    </div>
</form>