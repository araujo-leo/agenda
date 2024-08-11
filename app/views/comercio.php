        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="../app/views/assets/css/comercio.css">
            <link rel="stylesheet" href="../app/views/assets/fonts/font-awesome/css/all.min.css">   
        </head>

        <body>
            <div class="sidebar">
                <h2>Dashboard</h2>
                <ul>
                    <li class="home"><a href="../public/">Home</a></li>
                    <li class="amigos"><a href="../public/amigos">Amigos</a></li>
                    <li class="comercios"><a href="../public/comercios">Comércio</a></li>
                    <li><a href="../public/configurações">Configurações</a></li>
                </ul>
            </div>
            <div class="content">
                <button id="mostrarOcultarBtn">Mostrar Formulário</button>

                <form action="comercios" method="post" id="cadastrar_comercio">
                    <label for="contato">Contato</label>
                    <input type="text" name="contato" required placeholder="Nome e Sobrenome">
                    <label for="comercio">Comercio</label>
                    <input type="text" name="comercio" required placeholder="Nome da empresa">
                    <label for="telefone">Telefone</label>
                    <input type="text" name="tel" required placeholder="11999999999">
                    <label for="email">Email</label>
                    <input type="email" name="email" required placeholder="vendedor@empresa.com">

                    <input type="submit" value="Cadastrar Empresa">
                </form>

                <form class="search-container" action="comercios" method="POST">
                    <label for="procurar_comercio" style="display: none;">Procurar Amigos</label>
                    <input type="text" id="procurar_comercio" name="nome_comercio" placeholder="Procurar comercio"
                        required value="<?php if(isset($_POST['nome_comercio'])){
                echo $_POST['nome_comercio'];
            }?>">
                    <button type="submit" aria-label="Buscar">
                        <img src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"
                            alt="Search Icon">
                    </button>
                </form>
                <?php 
    if (isset($_SESSION['error_message'])) {
        echo "<p class='alert'>{$_SESSION['error_message']}</p>";
        unset($_SESSION['error_message']); 
    }
    if (!empty($comercios)) {
    ?>
                <Table>
                    <tr>
                        <th>Contato</th>
                        <th>Empresa</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>#</th>
                    </tr>
                    <?php 
            foreach($comercios as $comercio){
                ?>
                    <tr>
                        <form action="../public/updatecomercio" method="POST">
                            <td>
                                <input type="hidden" name="cod" value="<?php echo $comercio['cod']; ?>">
                                <input type="text" class="nao-editavel comercioDado<?php echo $comercio['cod']; ?>"
                                    name="nome" value="<?php echo $comercio['contato'];?>" readonly>
                            </td>
                            <td>
                                <input type="text" class="nao-editavel comercioDado<?php echo $comercio['cod']; ?>"
                                    name="empresa" value="<?php echo $comercio['empresa'];?>" readonly>
                            </td>
                            <td>
                                <input type="text" class="nao-editavel comercioDado<?php echo $comercio['cod']; ?>"
                                    name="tel" value="<?php echo $comercio['tel'];?>" readonly>
                            </td>
                            <td>
                                <input type="email" class="nao-editavel comercioDado<?php echo $comercio['cod']; ?>"
                                    name="email" value="<?php echo $comercio['email'];?>" readonly>
                            </td>
                            <td>
                                <form action="../public/updatecomercio" method="POST">

                                    <button type="submit" id="confirmEditComercio<?php echo $comercio['cod']; ?>"><i
                                            class="fa-solid fa-floppy-disk"></i></button>
                                </form>
                                <button id="cancelEditComercio<?php echo $comercio['cod']; ?>"
                                    onclick="cancelarEditAmigo(<?php echo $comercio['cod']; ?>)"><i
                                        class="fa-solid fa-xmark"></i></button>
                                <button id="editComercio<?php echo $comercio['cod']; ?>"
                                    onclick="editarComercio(<?php echo $comercio['cod']; ?>)"><i
                                        class="fa-solid fa-pencil"></i></button>
                                <button id="deleteComercio<?php echo $comercio['cod']; ?>"
                                    onclick="deleteComercio(<?php echo $comercio['cod']; ?>)"><i
                                        class="fa-solid fa-trash"></i></button>

                    </tr>
                    <?php
            }}?>
                </Table>

                <a href="../public/comercios" class="refresh-button"><i class="fa-solid fa-arrows-rotate"></i></a>



            </div>
            <script src="../app/views/assets/sweetalert2/sweetalert2.all.min.js"></script>

            <script src="../app/views/assets/js/comercio.js"></script>

        </body>

        </html>