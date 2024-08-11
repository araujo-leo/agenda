<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../app/views/assets/css/config.css">
    <link rel="stylesheet" href="../app/views/assets/fonts/font-awesome/css/all.min.css">
</head>
<body>


    <div class="config-container">
        <form action="../public/updateuserconfig" name="configuser" method="post" enctype="multipart/form-data" class="config-form configuser">
            <div>
                <div>
                    <a href="../public/"><i class="fa-solid fa-arrow-left-long"></i> Voltar</a>
                    <h2>Configurações</h2>

             
                    <img class="user-image" src="<?php echo $_SESSION['userData']['imagem'];?>">
                    

                </div>
                <div class="input-group alert">
                        <?php 
                            if (isset($_SESSION['error_message'])) {
                                echo "<p>{$_SESSION['error_message']}</p>";
                                unset($_SESSION['error_message']); 
                            }
                        ?>
                </div>
                <div class="input-group">
                    <label for="username">Nome</label>
                    <input type="text" name="nome" value="<?php echo $_SESSION['userData']['nome'];?>">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?php echo $_SESSION['userData']['email'];?>">
                </div>
                <div class="input-group">
                    <label for="password">Senha Atual</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="input-group">
                    <label for="password">Nova senha</label>
                    <input type="password" id="password" name="newpassword">
                </div>
                <div class="input-group">
                    <label for="password-confirm">Confirme a Senha</label>
                    <input type="password" id="password-confirm" name="passwordconfirm">
                </div>
            </div>
            <div>
                <div class="upload-container">
                    <input type="file" name="image" id="image" accept="image/*">
                    <label for="image" class="upload-label">
                        <div class="upload-icon">&#9729;</div>
                        <span>Clique ou arraste para fazer upload</span>
                    </label>
                    <img id="upload-preview" class="upload-preview" alt="Preview">
                </div>
            </div>
        <button type="submit">Confirmar</button>
        </form>
    </div>

    <script src="../app/views/assets/js/config.js"></script>
</body>
</html>
