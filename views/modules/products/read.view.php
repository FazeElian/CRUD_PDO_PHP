<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Productos</title>
</head>
<body>
    <div class="mx-5 my-5">
        <h1>Lista de Productos: </h1>
        <br>

        <a href="?c=Products&a=createProduct"><button class="btn btn-primary">Nuevo Producto</button></a>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $product->getIdProduct(); ?></td>
                        <td><?php echo $product->getNameProduct(); ?></td>
                        <td><?php echo $product->getPriceProduct(); ?></td>
                        <td>
                            <a href="?c=Products&a=updateProduct&idProduct=<?php echo $product->getIdProduct(); ?>" class="btn btn-primary">
                                Editar 
                            </a>	
                            <a href="?c=Products&a=deleteProduct&idProduct=<?php echo $product->getIdProduct(); ?>" class="btn btn-danger mx-3">
                                Eliminar
                            </a>							
                        <td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>