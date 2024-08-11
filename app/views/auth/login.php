<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../app/views/assets/css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <a href="../public"><i class="fa-solid fa-arrow-left-long"></i>Voltar</a>

        <form action="login?formulario_login_enviado=true" method="post" class="login-form" >
            <h2>Login</h2>
            <div class="input-group">
                <label for="username">Usuário</label>
                <input type="email" name="email">
            </div>
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Entrar</button>
            <p class="form-footer">Ainda não possui conta? <a href="cadastrar">Cadastre-se</a></p>
        </form>
    </div>  
</body>
</html>