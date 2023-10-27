<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario | Registrarse</title>
</head>
<body>
    <div class="mx-5 my-5">
        <h1>Registrarse</h1>
        <br>

        <form action="" method="post" class="form">
            <br>
            <label for="">Correo:</label>
            <input type="email" class="form-control" name="emailUser" required placeholder="Escribe aquí tu correo electrónico">
            <br>

            <label for="">Contraseña:</label>
            <input type="password" class="form-control" name="passwordUser" required placeholder="Escribe aquí tu Contraseña">

            <br>
            <button type="submit" class="btn btn-success">Registrarse</button>
        </form>

        <br>
        <a href="?c=Users&a=resetPassword&idUser=<?php echo $user->getIdUser() ?>"><button class="btn btn-primary px-4">Reestablecer contraseña</button></a></a>
    </div>
</body>
</html>