        

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../assets/css/style.css">
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                display:flex;
                flex-direction: row;
            }

            .sidebar {
                height: 100%;
                width: 20vw;
                position: fixed;
                top: 0;
                left: 0;
                background-color: #333;
                padding-top: 20px;
                z-index: 1; /* Garante que o sidebar fique acima do conteúdo */
            }



            .sidebar h2 {
                color: #fff;
                text-align: center;
            }

            .sidebar ul {
                list-style-type: none;
                padding: 0;
            }

            .sidebar ul li {
                padding: 10px;
                text-align: center;
            }

            .sidebar ul li a {
                color: #fff;
                text-decoration: none;
            }

            .sidebar ul li a:hover {
                background-color: #555;
            }

            .content {
                margin-left: 250px;
                padding: 20px;
            }

            .content h2 {
                color: #333;
            }

            .content p {
                color: #666;
            }

            .sidebar ul li.comercios {
                background-color: blue;
            }






            .content {
                margin-left: 20vw; 
                width: 75vw;
                padding: 20px; 
            }

            .content button {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
            }

            .content button:hover {
                background-color: #0056b3;
            }

            .content form {
                margin-bottom: 20px;
            }

            .content form label {
                font-weight: bold;
                margin-right: 10px;
            }

            .content form input[type="text"],
            .content form input[type="email"] {
                width: calc(100% - 20px);
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 5px;
            }

            .content form input[type="submit"] {
                background-color: #28a745;
                color: #fff;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
            }

            .content form input[type="submit"]:hover {
                background-color: #218838;
            }

            .content table {
                width: 100%;
                border-collapse: collapse;
            }

            .content table th,
            .content table td {
                padding: 8px;
                border: 1px solid #ddd;
                text-align: left;
            }

            .content table th {
                background-color: #007bff;
                color: #fff;
            }

            .content table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .content table tr:hover {
                background-color: #ddd;
            }

            .content .not-found {
                color: #dc3545;
                font-weight: bold;
            }

            #mostrarOcultarBtn{
                margin: 10px 0;
            }
        </style>
    </head>
    <body>
    <div class="sidebar">
        <h2>Dashboard</h2>
        <ul>
            <li class="home"><a  href="/">Home</a></li>
            <li class="amigos"><a  href="amigos">Amigos</a></li>
            <li class="comercios"><a href="comercios">Comércio</a></li>
            <li><a href="configurações">Configurações</a></li>
        </ul>
    </div>
    <div class="content">
        <button id="mostrarOcultarBtn">Mostrar Formulário</button>

        <form action="comercios" method="post" id="cadastrar_empresa">
            <label for="contato">Contato</label>
            <input type="text" name="contato" required placeholder="Nome e Sobrenome">
            <label for="comercio">Comercio</label>
            <input type="text" name="comercio" required placeholder="Nome da empresa">
            <label for="telefone">Telefone</label>
            <input type="text" name="tel" required placeholder="11999999999">
            <label for="email" >Email</label> 
            <input type="email" name="email" required placeholder="vendedor@empresa.com">

            <input type="submit" value="Cadastrar Empresa">
        </form>
        <Table>
            <tr>
                <th>Contato</th>
                <th>Empresa</th>
                <th>Telefone</th>
                <th>Email</th>
            </tr>
            <?php 
            foreach($comercios as $comercio){
                ?>
            <tr>
                
                <td><?php echo $comercio['contato'];?></td>
                <td><?php echo $comercio['empresa'];?></td>
                <td><?php echo $comercio['tel'];?></td>
                <td><?php echo $comercio['email'];?></td>
                
                
            </tr>
            <?php
            }?>
        </Table>
        <br>
            <hr>
            <br>
        <form action="comercios" method="POST">
            <label for="procurar_amigos">Procurar Comercio</label>
            <input type="text" name="nome_comercio" required>
            <input type="submit">
        </form>


        <?php 

        if(!isset($dadosComercio)){
            echo "Comercio não encontrado!";      
        }else
            {   
        ?>
        <Table>
            <tr>
                <th>Contato</th>
                <th>Empresa</th>
                <th>Telefone</th>
                <th>Email</th>
            </tr>
            <tr>
                <td><?php echo $dadosComercio['contato'];?></td>
                <td><?php echo $dadosComercio['empresa'];?></td>
                <td><?php echo $dadosComercio['tel'];?></td>
                <td><?php echo $dadosComercio['email'];?></td>
                
            </tr>
        </table>
        <?php
        }
        ?>
        </div>

        <script>

    document.getElementById("mostrarOcultarBtn").addEventListener("click", function() {
        var formulario = document.getElementById("cadastrar_empresa");
        
        
        if (formulario.style.display === "none") {
            formulario.style.display = "block"; 
            this.textContent = "Ocultar Formulário"; 
        } else {
            formulario.style.display = "none"; 
            this.textContent = "Mostrar Formulário"; 
        }
    });
        </script>
        
    </body>
    </html>