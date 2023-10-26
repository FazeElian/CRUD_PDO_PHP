<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Editar: <?php echo $product->getNameProduct() ?></title>
</head>
<body>
    <div class="mx-5 my-5">
        <h1>Editar Producto: <?php echo $product->getNameProduct() ?></h1>

        <form action="" method="post" class="form">
            <br>
            <input type="hidden" class="form-control" name="idProduct" value="<?php echo $product->getIdProduct() ?>">
            <br>

            <label for="">Nombre:</label>
            <input type="text" class="form-control" name="nameProduct" value="<?php echo $product->getNameProduct() ?>" required>
            <br>

            <label for="">Precio:</label>
            <input type="number" class="form-control" name="priceProduct" value="<?php echo $product->getPriceProduct() ?>" required>

            <br>
            <button type="submit" class="btn btn-success">Actualizar Producto</button>
        </form>
    </div>
</body>
</html>