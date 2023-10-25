<?php
    // echo $category->getNameCategory();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Categoría</title>
</head>
<body>
<br><br>
    <div class="card">
        <div class="card-header">
            Editar Categoría
        </div>
        <form action="" method="post">
            <div class="form-body">
                <div class="form-control">            
                    <label for="">Id: <?php echo $category->setNameCategory() ?></label>    
                    <input type="text" name="idCategory" value="<?php echo $category->setNameCategory() ?>">
                </div>
                <div class="form-control">
                    <label for="">Nombresdf</label>
                    <input type="text" name="rolName" value="<?php echo $rol->getRolName() ?>">
                </div>
            </div>
            <div class="form-footer">
                <input type="submit" value="Actualizar">
            </div>
        </form>
    </div>
</body>
</html>