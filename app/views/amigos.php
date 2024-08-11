<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../app/views/assets/css/amigos.css">
    <link rel="stylesheet" href="../app/views/assets/fonts/font-awesome/css/all.min.css">
</head>

<body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li class="home"><a href="../public/">Home</a></li>
            <li class="amigos"><a href="../public/amigos">Amigos</a></li>
            <li><a href="../public/comercios">Comércio</a></li>
            <li><a href="../public/configurações">Configurações</a></li>
        </ul>
    </div>

    <div class="content">
        <button id="mostrarOcultarBtn">Mostrar Formulário</button>

        <form action="amigos" method="post" id="cadastrar_amigos">
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required placeholder="Digite o nome do amigo">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="amigo@email.com">
            <label for="tel">Telefone</label>
            <input type="text" id="tel" name="tel" required placeholder="11999999999">
            <label for="datanasc">Nascimento</label>
            <input type="date" id="datanasc" name="datanasc" required placeholder="XX/XX/XXXX">
            <input type="submit" value="Cadastrar Amigo">
        </form>

        <form class="search-container" action="amigos" method="POST">
            <label for="procurar_amigos" style="display: none;">Procurar Amigos</label>
            <input type="text" id="procurar_amigos" name="nome_amigo" placeholder="Procurar amigos" required value="<?php if(isset($_POST['nome_amigo'])){
                echo $_POST['nome_amigo'];
            }?>">
            <button type="submit" aria-label="Buscar">
                <img src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png" alt="Search Icon">
            </button>
        </form>

        <table>
            <?php 
    if (isset($_SESSION['error_message'])) {
        echo "<p class='alert'>{$_SESSION['error_message']}</p>";
        unset($_SESSION['error_message']); 
    }
    if (!empty($amigos)) {
    ?>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Nascimento</th>
                <th>#</th>
            </tr>
            <?php 
        foreach ($amigos as $amigo) { ?>
            <tr>
                <form action="../public/updateamigo" method="POST">
                    <td>
                        <input type="hidden" name="cod" value="<?php echo $amigo['cod']; ?>">
                        <input type="text" class="nao-editavel amigoDado<?php echo $amigo['cod']?>" name="nome"
                            value="<?php echo $amigo['nome']; ?>" readonly>
                    </td>
                    <td>
                        <input type="text" class="nao-editavel amigoDado<?php echo $amigo['cod']?>" name="email"
                            value="<?php echo $amigo['email']; ?>" readonly>
                    </td>
                    <td>
                        <input type="text" class="nao-editavel amigoDado<?php echo $amigo['cod']?>" name="tel"
                            value="<?php echo $amigo['tel']; ?>" readonly>
                    </td>
                    <td>
                        <input type="date" class="nao-editavel amigoDado<?php echo $amigo['cod']?>" name="datanasc"
                            value="<?php echo $amigo['datanasc']; ?>" readonly>
                    </td>
                    <td>
                        <button type="submit" id="confirmEditAmigo<?php echo $amigo['cod']?>"><i
                                class="fa-solid fa-floppy-disk"></i></button>
                </form>
                <button id="cancelEditAmigo<?php echo $amigo['cod']?>"
                    onclick="cancelarEditAmigo(<?php echo $amigo['cod']; ?>)"><i class="fa-solid fa-xmark"></i></button>
                <button id="editAmigo<?php echo $amigo['cod']?>" onclick="editarAmigo(<?php echo $amigo['cod']; ?>)"><i
                        class="fa-solid fa-pencil"></i></button>
                <button id="deleteAmigo<?php echo $amigo['cod']?>"
                    onclick="deleteAmigo(<?php echo $amigo['cod']; ?>)"><i class="fa-solid fa-trash"></i></button>
            </tr>
            <?php }} ?>
        </table>



        <a href="../public/amigos" class="refresh-button"><i class="fa-solid fa-arrows-rotate"></i></a>


    </div>

    <script src="../app/views/assets/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../app/views/assets/js/amigos.js"></script>
</body>

</html>