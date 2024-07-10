
<?php 

class ComercioModel{
    public function getAllComercios(){
        require '../config/conexao.php';

        $cod = $_SESSION['cod'];
        $sql = "SELECT * FROM tbcomercio WHERE usuario_cod = $cod";
        $resultado = $conn->query($sql);
    
        $comercios = array();
        while ($row = $resultado->fetch_assoc()) {
            $comercios[] = $row;
        }

        
    
        return $comercios;
    }

    public function procurarComercio($nomeComercio){
        require '../config/conexao.php';
    
        $sql = "SELECT * FROM tbcomercio WHERE empresa  LIKE ? AND usuario_cod = ?;";
        $stmt = $conn->prepare($sql);
    
        if (!$stmt) {
            die('Erro ao preparar a consulta: ' . $conn->error);
        }

        $cod = $_SESSION['cod'];

        $nomeComercio = "%" . $nomeComercio . "%";
    
        $stmt->bind_param("si", $nomeComercio, $cod);
    
        $stmt->execute();
    
        $resultado = $stmt->get_result();
        $dadosComercio = $resultado->fetch_assoc();
    
        $stmt->close();
    
        return $dadosComercio;
    }

    public function cadastrarComercio($dadosCadastro){
        require '../config/conexao.php';
        $sql = "INSERT INTO tbcomercio (contato,empresa,tel,email,usuario_cod) VALUES (?,?,?,?,?);";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssssi", $dadosCadastro['contato'], $dadosCadastro['comercio'], $dadosCadastro['telefone'], $dadosCadastro['email'], $_SESSION['cod']);

        if ($stmt->execute()) {
            header('Location: comercios');
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
            http_response_code(500);
        }

        $stmt->close();
        $conn->close();
    }
    
}