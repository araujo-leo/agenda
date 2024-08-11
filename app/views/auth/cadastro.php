<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../app/views/assets/css/cadastro.css">
    <link rel="stylesheet" href="../app/views/assets/fonts/font-awesome/css/all.min.css">
</head>
<body>

    <div class="login-container">
        <a href="../public/login"><i class="fa-solid fa-arrow-left-long"></i> Voltar</a>
        <form action="cadastrar?formulario_cadastro_enviado=true" method="post" class="login-form" >
            <h2>Cadastrar-se</h2>
            <div class="input-group">
                <label for="username">Nome</label>
                <input type="text" name="name">
            </div>
            <div class="input-group">
                <label for="username">E-mail</label>
                <input type="email" name="email">
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
    </div> 
</body>
</html>