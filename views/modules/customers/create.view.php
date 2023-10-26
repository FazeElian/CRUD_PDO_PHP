<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes | Crear</title>
</head>
<body>
    <div class="mx-5 my-5">
        <h1>Nuevo Cliente</h1>

        <form action="" method="post" class="form">
            <br>
            <label for="">Nombre:</label>
            <input type="text" class="form-control" name="nameCustomer" required placeholder="Escribe aquí nombre de nuevo Cliente">
            <br>

            <label for="">Descripción:</label>
            <textarea name="descriptionCustomer" cols="30" rows="3" class="form-control px-3 py-3" placeholder="Describe aquí nuevo Cliente" required></textarea>
            <br>
            <button type="submit" class="btn btn-success">Crear Cliente</button>
        </form>
    </div>
</body>
</html>