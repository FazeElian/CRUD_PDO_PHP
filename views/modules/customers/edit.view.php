<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes | Editar: <?php echo $customer->getNameCustomer() ?></title>
</head>
<body>
    <div class="mx-5 my-5">
        <h1>Editar Cliente: <?php echo $customer->getNameCustomer() ?> </h1>

        <form action="" method="post" class="form">
            <input type="hidden" class="form-control" name="idCustomer" value="<?php echo $customer->getIdCustomer() ?>">

            <br>
            <label for="">Nombre:</label>
            <input type="text" class="form-control" name="nameCustomer" placeholder="Escribe aquí nombre del Cliente" required value="<?php echo $customer->getNameCustomer() ?>">
            <br>

            <label for="">Descripción:</label>
            <input type="text" class="form-control" name="descriptionCustomer" placeholder="Describe aquí al Cliente" required value="<?php echo $customer->getDescriptionCustomer() ?>">
            <br>
            <button type="submit" class="btn btn-success">Actualizar Cliente</button>
        </form>
    </div>
</body>
</html>