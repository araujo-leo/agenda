    <?php 



    class UserModel {

        public static function getAllUsers() {
            require "../config/conexao.php";
            $sql = "SELECT * FROM users";
            $resultado = $conn->query($sql);
        
            $users = array();
            while ($row = $resultado->fetch_assoc()) {
                $users[] = $row;
            }
        
            return $users;
        }

        public static function cadastrarUsuario($dadosCadastro) {
            require "../config/conexao.php";
            
            $sql = "INSERT INTO tbusuario (nome, email, senha) VALUES (?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
        
            $passwordHash = password_hash($dadosCadastro['password'], PASSWORD_DEFAULT);
            
            $stmt->bind_param("sss", $dadosCadastro['name'], $dadosCadastro['email'], $passwordHash);
            
            if ($stmt->execute()) {
                echo '<script>alert("Cadastro Efetuado!"); window.location.href = "/";</script>';
                exit();
            } else {
                echo '<script>alert("Erro ao inserir dados' . $conn->error . '");</script>';
                http_response_code(500);
            }
        
            $stmt->close();
            $conn->close();
        }


        public static function loginUsuario($dadosLogin) {
            require "../config/conexao.php";
        
            $sql = "SELECT * FROM tbusuario WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $dadosLogin['email']);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
        
            if ($result->num_rows > 0) {
                $usuario = $result->fetch_assoc();
                
                if(password_verify($dadosLogin['password'], $usuario['senha'])){
                    $_SESSION['usuario'] = $usuario['nome'];
                    $_SESSION['cod'] = $usuario['cod'];
                    $_SESSION['login'] = TRUE;

                    $_SESSION['userData'] = $usuario;
                    echo '<script> window.location.href = "/";</script>';
                    exit(); 
                } else {
                    echo '<script>alert("Senha incorreta");</script>';
                }
            } else {
                echo '<script>alert("Usuário não encotrado");</script>';
            }
        
            $conn->close();
        }

        public static function updateUser($novoNome, $novoEmail, $novaSenha, $imagePath) {
            require "../config/conexao.php";
        
            $sql = "UPDATE tbusuario SET nome = ?, email = ?, senha = ?, imagem = ? WHERE cod = ?";
            
            $stmt = $conn->prepare($sql);
            
            if (!empty($novaSenha)) {
                $passwordHash = password_hash($novaSenha, PASSWORD_DEFAULT);
            } else {
                $passwordHash = $_SESSION['userData']['senha'];
            }
            
            $oldImagePath = $_SESSION['userData']['imagem'];
            $imagePath = !empty($imagePath) ? $imagePath : $oldImagePath;
        
            if (!empty($imagePath) && $imagePath !== $oldImagePath) {
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
        
            $stmt->bind_param("ssssi", $novoNome, $novoEmail, $passwordHash, $imagePath, $_SESSION['userData']['cod']);
            
            if ($stmt->execute()) {
                echo '<script>alert("Dados atualizados com sucesso."); window.location.href = "/";</script>';
                $_SESSION['userData']['nome'] = $novoNome;
                $_SESSION['userData']['email'] = $novoEmail;
                $_SESSION['userData']['senha'] = $passwordHash;
                $_SESSION['userData']['imagem'] = $imagePath;
                exit();
            } else {
                echo '<script>alert("Erro ao atualizar os dados' . $conn->error . '");</script>';
                http_response_code(500);
            }
        
            $stmt->close();
            $conn->close();
        }

       


    }
