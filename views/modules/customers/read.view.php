<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <div class="mx-5 my-5">
        <h1>Lista de Clientes: </h1>
        <br>

        <a href="?c=Customers&a=createCustomer"><button class="btn btn-primary">Nuevo Cliente</button></a>
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
                <?php foreach ($customers as $customer) : ?>
                    <tr>
                        <td><?php echo $customer->getIdCustomer(); ?></td>
                        <td><?php echo $customer->getNameCustomer(); ?></td>
                        <td><?php echo $customer->getDescriptionCustomer(); ?></td>
                        <td>
                            <a href="?c=Customers&a=updateCustomer&idCustomer=<?php echo $customer->getIdCustomer(); ?>" class="btn btn-primary">
                                Editar 
                            </a>	
                            <a href="?c=Customers&a=deleteCustomer&idCustomer=<?php echo $customer->getIdCustomer(); ?>" class="btn btn-danger mx-3">
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