<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Categorías</title>
</head>
<body>
    <br><br>
    <div class="card">
        <div class="card-header">
            Categorías de Productos
            <a href="?c=Categories&a=createCategory"><button class="btn btn-primary mx-5">Nueva Categoría</button></a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td scope="row"><?php echo $category->getIdCategory(); ?></td>
                            <td><?php echo $category->getNameCategory(); ?></td>
                            <td>
                                <a href="?c=Categories&a=updateCategory&idCategory=<?php echo $category->getIdCategory() ?>" class="btn btn-info">
                                    Editar 
                                </a>	
                                <a href="?c=Categories&a=deleteCategory&idCategory=<?php echo $category->getIdCategory() ?>" class="btn btn-danger">
                                    Eliminar
                                </a>							
                            <td>
                        </tr>
                    <?php endforeach; ?>	
                </tbody>
            </table>
        </div> 
    </div>        
</body>
</html>