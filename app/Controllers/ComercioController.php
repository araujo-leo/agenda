<?php

require_once '../config/conexao.php';
require_once '../app/Models/ComercioModel.php';

class ComercioController {
    private $ComercioModel; 

    public function __construct() {
        $this->ComercioModel = new ComercioModel();
    }

    public function index() {
        if (isset($_SESSION['login']) && $_SESSION['login'] == true){

            $comercios = $this->ComercioModel->getAllComercios(); 
            $dadosComercio = null;

            if(isset($_POST['nome_comercio']) && !empty($_POST['nome_comercio'])){
                $nomeComercio = $_POST['nome_comercio'];
                try{
                    $comercios = $this->ComercioModel->procurarComercio($nomeComercio);
                    if(empty($comercios)){
                        $_SESSION['error_message'] = "Nenhum comércio encontrado com o nome '{$nomeComercio}'.";
                    }
                } catch (Exception $e){
                    echo 'Erro ao procurar amigo: ' . $e->getMessage(); 
                }
            }else{
                $amigos = $this->ComercioModel->getAllComercios();
            }
            
            if(isset($_POST['contato']) && isset($_POST['comercio']) && isset($_POST['tel']) && isset($_POST['email'])){

                $dadosCadastro = [
                    'contato' => $_POST['contato'],
                    'comercio' => $_POST['comercio'],
                    'telefone' => $_POST['tel'],
                    'email' => $_POST['email']
                ];

                try {
                    $this->ComercioModel->cadastrarComercio($dadosCadastro);
                    header('Location: ../public/comercios');
                    exit();
                } catch (Exception $e) {
                    echo 'Erro ao processar o cadastro: ' . $e->getMessage(); 
                } 
            }



            include_once '../app/views/comercio.php';

        }else{
            header('Location: ../public/login');
        }
    }

    public function updateComercio(){
        if (isset($_SESSION['login']) && $_SESSION['login'] == true){
            //achando o amigo correspondente a edição
            $comercios = $this->ComercioModel->getAllComercios();
            foreach($comercios as $comercio){
                if($comercio['cod'] == $_POST['cod']){
                    $comerciocorreto = $comercio;
                }
            }
            
           
            
            $novoNome = $_POST['nome'];
            $novoEmpresa = $_POST['empresa'];
            $novoTel = $_POST['tel'];
            $novoEmail = $_POST['email'];

            $isModified = false;

            if($novoNome !== $comerciocorreto['nome']){
                $isModified = true;
            }
            if($novoEmpresa !== $comerciocorreto['empresa']){
                $isModified = true;
            }
            if($novoTel !== $comerciocorreto['tel']){
                $isModified = true;
            }
            if($novoEmail !== $comerciocorreto['email']){
                $isModified = true;
            }

            if($isModified){
                $this->ComercioModel->updateComercio($comerciocorreto['cod'],$novoNome, $novoEmpresa, $novoTel, $novoEmail);
                echo "Dados atualizados com sucesso.";
                header('Location: ../public/comercios');
            }else{
                header('Location: ../public/comercios');
                $_SESSION['error_message'] = "Nenhuma modificação foi feita!";
                exit;
            }
        }else{
            header('Location: ../public/login');
        } 

        
    }

    public function deleteComercio(){
        if (isset($_SESSION['login']) && $_SESSION['login'] == true){
            if(isset($_GET['id'])){
                $id = intval($_GET['id']);
                $this->ComercioModel->deleteComercio($id);
            }
            else{
                header('Location: ../public/comercios');
                $_SESSION['error_message'] = "OPS! Algo ocorreu inesperadamente.";
                exit;
            }
        }else{
            header('Location: ../public/login');
        } 
    }

    
}