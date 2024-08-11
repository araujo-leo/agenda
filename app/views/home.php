

<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../app/views/assets/css/home.css">
    <link rel="stylesheet" href="../app/views/assets/fonts/font-awesome/css/all.min.css">
    
</head>
<body>
    <h1>Seja bem vindo, <?php if(isset($_SESSION['usuario'])){ echo ucwords($_SESSION['usuario']);} else { echo "Acesse seu perfil ou cadastre-se"; }?>.</h1>
    

    <div class="container">
      
        <?php if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
        ?>
            <div class="square red" title="Você será redirecionado para a página de configurações."><a href="../public/configurações"><i class="fa-solid fa-gear"></i></a></div>
        <?php   
        }else{
        ?>
            <div class="square red" title="Você será redirecionado para a página de login."><a href="../public/login" ><i class="fa-solid fa-user"></i></a></div>
        <?php } ?>
        <div class="square blue" title="Você será redirecionado para a página de amigos."><a href="../public/amigos"  alt="amigos"><i class="fa-solid fa-user-group"></i></a></div>
        <div class="square green" title="Você será redirecionado para a página de comércios."><a href="../public/comercios"><i class="fa-solid fa-building"></i>  </a></div>
        <div class="square yellow" title="Você será deslogado."><a href="../public/logout" <?php if(!isset($_SESSION['login'])){echo 'class = "disabled"';}?>><i class="fa-solid fa-right-from-bracket"></i></a></div>
    </div>
</body>
</html>
