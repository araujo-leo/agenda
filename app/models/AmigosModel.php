
<?php 

class AmigosModel{
    public function getAllAmigos(){
        require '../config/conexao.php';

        $cod = $_SESSION['cod'];
        $sql = "SELECT * FROM tbamigos WHERE usuario_cod = $cod";
        $resultado = $conn->query($sql);
    
        $users = array();
        while ($row = $resultado->fetch_assoc()) {
            $users[] = $row;
        }
    
        return $users;
    }

    public function procurarAmigo($nomeAmigo){
        require '../config/conexao.php';
    
        $sql = "SELECT * FROM tbamigos WHERE nome LIKE ? AND usuario_cod = ?;";
        $stmt = $conn->prepare($sql);
    
        if (!$stmt) {
            die('Erro ao preparar a consulta: ' . $conn->error);
        }
        
        $cod = $_SESSION['cod'];

        $nomeAmigo = "%" . $nomeAmigo . "%";
    
        $stmt->bind_param("si", $nomeAmigo, $cod);
    
        $stmt->execute();
    
        $resultado = $stmt->get_result();
        $dadosAmigo = $resultado->fetch_assoc();
    
        $stmt->close();
    
        return $dadosAmigo;
    }

    public function cadastrarAmigo($dadosCadastro){
        require '../config/conexao.php';
        $sql = "INSERT INTO tbamigos (nome,email,datanasc,tel,usuario_cod) VALUES (?,?,?,?,?);";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssssi", $dadosCadastro['nome'], $dadosCadastro['email'], $dadosCadastro['telefone'], $dadosCadastro['datanasc'], $_SESSION['cod']);

        if ($stmt->execute()) {
            header('Location: amigos');
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
            http_response_code(500);
        }

        $stmt->close();
        $conn->close();
    }
    
}