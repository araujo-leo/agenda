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
            min-height: 100vh;
            background-color: #f4f4f4;
            font-family: 'Arial', sans-serif;
        }

        .config-container {
            width: 70vw;
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: stretch; /* Alinhamento vertical */
        }

        .config-form {
            flex: 2;
            margin-right: 40px;
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
        }

        .config-form h2 {
            margin-top: 0;
            color: #333;
        }

        .input-group {
            margin-bottom: 20px;
            width: 100%;
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
       .alert p{
            background-color: rgba(255, 0, 0, 0.5);
            padding: 10px; 
            color: #fff;
            border-radius: 5px; 
            border: 1px solid rgba(255, 0, 0, 0.7); 
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
            font-size: 16px; 
            text-align: center; 
            margin: 10px auto; 
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

        .config-container a {
            width: 80px;
            text-decoration: none;
            color: grey;
            margin: 10px 0;
            position: relative;
            display: inline-block;
        }

        .config-container a::before {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: blue;
            transition: width 0.5s ease;
        }

        .config-container a:hover::before {
            width: 100%;
        }

        .config-container a:hover {
            color: blue;
            border-bottom: 2px solid blue;
            transition: ease 1s;
        }

        .upload-container {
            width: 100%;
            margin-bottom: 10px;    
            min-height: 20vh; 
            max-height:50vh;
            background-color: #fff;
            border: 2px dashed #ccc;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            position: relative;
            flex-direction: column;
            
            overflow-x: scroll;
            overflow-y: scroll;
            white-space: nowrap;
        }

        .upload-container input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .upload-label {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
            cursor: pointer;
        }

        .upload-icon {
            font-size: 50px;
            color: #ccc;
        }

        .upload-label span {
            margin-top: 10px;
            font-size: 16px;
            color: #666;
        }

        .upload-preview {
            display: none;
            width: 100%;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <div class="config-container">
        <form action="/updateuserconfig" name="configuser" method="post" enctype="multipart/form-data" class="config-form configuser">
            <div>
                <div>
                    <a href="/"><i class="fa-solid fa-arrow-left-long"></i> Voltar</a>
                    <h2>Configurações</h2>

                    <img src="<?php echo $_SESSION['userData']['imagem'];?>" alt="">
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

    <script>
        document.getElementById('image').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const preview = document.getElementById('upload-preview');
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    document.querySelector('.upload-label').style.display = 'none';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
