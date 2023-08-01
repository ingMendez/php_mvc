<?php
//  require_once("../resources/assets/header.php");
require_once '../resources/views/assets/header.php';
?>
<h1>Detalle Del user</h1>
    <!-- &nbsp; <a href="/user">Volver</a>  -->
   <form id ="show">
    <a href="/user" class="btn btn-primary btn-lg" role="button">Volver</a>
    <a href="/user/<?= $user['user_id']?>/edit" class="btn btn-success btn-lg" role="button">Edit</a>
                     
    <button type="button" id="btnEditar" class="btn btn-success">Editar</button>
    <p>Nombre: <?= $user['name']?></p>
    <p>user name: <?= $user['user_name']?></p>
    <p>Email: <?= $user['email']?></p>

   
    <!-- <form action="/user/<?= $user['user_id']?>/delete" method="post" > -->
    <button type="click"  onclick="eliminar()" class="btn btn-danger">Delete</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- <script src="/app/js/user.js"></script> -->
    <!-- </script src="user.js"></script> -->
 <script>
    <?php require_once("../app/js/user.js");?>
</script> 
<?php
//  include('../app/js/user.js');
require_once '../resources/views/assets/footer.php';
?>