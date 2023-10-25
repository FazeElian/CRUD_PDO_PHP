<form action="" method="post">
    <div class="form-header">
        <h1>Editar Rol</h1>
    </div>
    <div class="form-body">
        <div class="form-control">            
            <input type="hidden" name="rolCode" value="<?php echo $rol->getRolCode() ?>">
        </div>
        <div class="form-control">
            <label for="">Nombre</label>
            <input type="text" name="rolName" value="<?php echo $rol->getRolName() ?>">
        </div>
    </div>
    <div class="form-footer">
        <input type="submit" value="Actualizar">
    </div>
</form>