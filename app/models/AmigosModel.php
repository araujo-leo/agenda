
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

    public function procurarAmigo($nomeAmigo) {
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
        $amigos = [];
    
        while ($row = $resultado->fetch_assoc()) {
            $amigos[] = $row;
        }
    
        $stmt->close();
        return $amigos;
    }

    public function cadastrarAmigo($dadosCadastro){
        require '../config/conexao.php';
    
        $data = DateTime::createFromFormat('Y-m-d', $dadosCadastro['datanasc']);
        if (!$data || $dadosCadastro['datanasc'] < '1000-01-01') {
            echo "Data de nascimento inválida.";
            return;
        }
    
        $sql = "INSERT INTO tbamigos (nome,email,datanasc,tel,usuario_cod) VALUES (?,?,?,?,?);";
    
        $stmt = $conn->prepare($sql);
    
        $stmt->bind_param("ssssi", $dadosCadastro['nome'], $dadosCadastro['email'], $dadosCadastro['datanasc'], $dadosCadastro['telefone'], $_SESSION['cod']);
    
        if ($stmt->execute()) {
            header('Location: amigos');
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
            http_response_code(500);
        }
    
        $stmt->close();
        $conn->close();
    }
    

    public static function updateAmigo($cod, $novoNome, $novoEmail, $novoTel, $novoDataNasc) {
        require "../config/conexao.php";

        $sql = "UPDATE tbamigos SET nome = ?, email = ?, datanasc = ?, tel = ? WHERE cod = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssi", $novoNome, $novoEmail, $novoDataNasc, $novoTel, $cod);

            if ($stmt->execute()) {
                echo "Amigo atualizado com sucesso!";
            } else {
                echo "Erro ao atualizar amigo: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro ao preparar a declaração: " . $conn->error;
        }

        $conn->close();
    }

    public static function deleteAmigo($id){

        require "../config/conexao.php";

        $sql = "DELETE FROM tbamigos WHERE cod = ?";

        if ($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("i", $id);
    
            if ($stmt->execute()) {
                header('Location: ../public/amigos');
                exit;
            } else {
                echo "Erro ao deletar: " . $conn->error;
                http_response_code(500);
            }
    
            $stmt->close(); 
        } else {
            echo "Erro ao preparar a declaração: " . $conn->error;
        }    
    }
}

