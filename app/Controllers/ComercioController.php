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

            

            

            if (isset($_POST['nome_comercio'])) {
                $dadosComercio = "";
                
                $nomeComercio = $_POST['nome_comercio'];
                
                try {
                    $dadosComercio = $this->ComercioModel->procurarComercio($nomeComercio);  
                } catch (Exception $e) {
                    echo 'Erro ao procurar comercio: ' . $e->getMessage(); 
                }            
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
                    header('Location: comercios');
                    exit();
                } catch (Exception $e) {
                    echo 'Erro ao processar o cadastro: ' . $e->getMessage(); 
                } 
            }



            include_once '../app/views/comercio.php';

        }else{
            header('Location: /login');
        }
    }

    

    
}