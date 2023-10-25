<table border="1">
    <thead>
        <tr>
            <th>Rol</th>
            <th>Código</th>
            <th>Id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Celular</th>            
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <td><?php echo $user->getRolCode(); ?></td>
                <td><?php echo $user->getUserCode(); ?></td>
                <td><?php echo $user->getUserId(); ?></td>
                <td><?php echo $user->getUserName(); ?></td>
                <td><?php echo $user->getUserLastName(); ?></td>
                <td><?php echo $user->getUserEmail(); ?></td>
                <td><?php echo $user->getUserPhone(); ?></td>                
                <td><?php echo $user->getUserStatus(); ?></td>
                <td>
                    <a href="?c=Users&a=updateUser&userCode=<?php echo $user->getUserCode() ?>">Editar</a>
                    <a href="?c=Users&a=deleteUser&userCode=<?php echo $user->getUserCode() ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>