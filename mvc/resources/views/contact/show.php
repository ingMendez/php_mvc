<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEtalles de contactos</title>
</head>
<body>
    <h1>DEtalle Del Contacto</h1>
    <a href="/contact"> Volver </a></br>
    <a href="/contact/<?= $contact['id']?>/edit"> Editar </a>
    <p>Nombre: <?= $contact['name']?></p>
    <p>Email: <?= $contact['email']?></p>
    <p>Phone: <?= $contact['phone']?></p>

    <form action="/contact/<?= $contact['id']?>/delete" method="post" >
    <button>
        Eliminar
    </button>
     </form>
    <!-- <a href="/contact/<?= $contact['id']?>/delete"> Eliminar </a></br> -->
</body>
</html>