<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos | Crear</title>
</head>
<body>
    <br><br>
    <div class="card">
        <div class="card-header">
            Nuevo Producto
        </div>
        <form action="" class="mx-4 my-4" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nameProduct">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Categoría:</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="idCategory">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Descripción:</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="descriptionProduct">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Precio:</label>
                <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="priceProduct">
            </div>
            <button type="submit" class="btn btn-primary px-4">Crear Producto</button>
        </form>
    </div>
</body>
</html>