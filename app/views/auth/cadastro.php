<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            margin-top: 0;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
            width: 300px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .form-footer {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }

        .form-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .login-container a {
            text-decoration: none;
            color: grey;
            margin: 10px 0;
            position: relative;
            display: inline-block;
        }

        .login-container a::before {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: blue;
            transition: width 0.5s ease;
        }

        .login-container a:hover::before {
            width: 100%;
        }

        .login-container a:hover{
            color: blue;
            border-bottom: 2px solid blue;
            transition: ease 1s;
        }

    </style>
</head>
<body>

    <div class="login-container">
        <a href="/"><i class="fa-solid fa-arrow-left-long"></i> Voltar</a>
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