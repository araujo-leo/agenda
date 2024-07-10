

<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;  
            flex-direction: column;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            max-width: 70%;
        }

        .square {
            position: relative;
            width: 300px; 
            margin: 1%; 
        }

        .square::before {
            content: '';
            display: block;
            padding-top: 100%; 
        }

        .square a {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff; 
            text-decoration: none;
        }

        .red { background-color: red; }
        .blue { background-color: blue; }
        .green { background-color: green; }
        .yellow { background-color: yellow; }

        i{
            position: relative;
            transform: scale(8);
        }

        .disabled{
            cursor: not-allowed;      
        }
    </style>
</head>
<body>
    <h1>Seja bem vindo, <?php if(isset($_SESSION['usuario'])){ echo ucwords($_SESSION['usuario']);} else { echo "Acesse seu perfil ou cadastre-se"; }?>.</h1>
    

    <div class="container">
      
        <?php if(isset($_SESSION['login']) && $_SESSION['login'] == true) {
        ?>
            <div class="square red"><a href="configurações"><i class="fa-solid fa-gear"></i></a></div>
        <?php   
        }else{
        ?>
            <div class="square red"><a href="login"><i class="fa-solid fa-user"></i></a></div>
        <?php } ?>
        <div class="square blue"><a href="amigos"  ><i class="fa-solid fa-user-group"></i></a></div>
        <div class="square green"><a href="comercios"><i class="fa-solid fa-building"></i>  </a></div>
        <div class="square yellow"><a href="logout" <?php if(!isset($_SESSION['login'])){echo 'class = "disabled"';}?>><i class="fa-solid fa-right-from-bracket"></i></a></div>
    </div>
</body>
</html>
