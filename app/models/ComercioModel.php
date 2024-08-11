
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
        $comercios = [];

        while($row = $resultado->fetch_assoc()){
            $comercios[] = $row;
        }
    
        $stmt->close();
    
        return $comercios;
    }

    public function cadastrarComercio($dadosCadastro){
        require '../config/conexao.php';
        $sql = "INSERT INTO tbcomercio (contato,empresa,tel,email,usuario_cod) VALUES (?,?,?,?,?);";

        $stmt = $conn->prepare($sql);

        $stmt->bind_param("ssssi", $dadosCadastro['contato'], $dadosCadastro['comercio'], $dadosCadastro['telefone'], $dadosCadastro['email'], $_SESSION['cod']);

        if ($stmt->execute()) {
            header('Location: ../public/comercios');
        } else {
            echo "Erro ao inserir dados: " . $conn->error;
            http_response_code(500);
        }

        $stmt->close();
        $conn->close();
    }

    public static function updateComercio($cod, $novoNome, $novoEmpresa, $novoTel, $novoEmail) {
        require "../config/conexao.php";

        $sql = "UPDATE tbcomercio SET contato = ?, empresa = ?, tel = ?, email = ? WHERE cod = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssi", $novoNome, $novoEmpresa, $novoTel, $novoEmail, $cod);

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

    
    public static function deleteComercio($id){

        require "../config/conexao.php";

        $sql = "DELETE FROM tbcomercio WHERE cod = ?";

        if ($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("i", $id);
    
            if ($stmt->execute()) {
                header('Location: ../public/comercios');
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