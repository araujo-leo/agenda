<?php

require_once '../config/conexao.php';
require_once '../app/Models/AmigosModel.php';


class AmigosController {
    private $AmigosModel; 

    public function __construct() {
        $this->AmigosModel = new AmigosModel();
    }

    public function index() {    
        if (isset($_SESSION['login']) && $_SESSION['login'] == true){
            $amigos = $this->AmigosModel->getAllAmigos(); 
            $dadosAmigo = null;

            

            if (isset($_POST['nome_amigo'])) {
                $dadosAmigo = "niuands";
                
                $nomeAmigo = $_POST['nome_amigo'];
                
                try {
                    $dadosAmigo = $this->AmigosModel->procurarAmigo($nomeAmigo);  
                } catch (Exception $e) {
                    echo 'Erro ao procurar amigo: ' . $e->getMessage(); 
                }            
            }

            if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['datanasc'])){
                $dadosCadastro = [
                    'nome' => $_POST['nome'],
                    'email' => $_POST['email'],
                    'telefone' => $_POST['tel'],
                    'datanasc' => $_POST['datanasc']
                ];

                try {
                    $this->AmigosModel->cadastrarAmigo($dadosCadastro);
                    header('Location: amigos');
                    exit();
                } catch (Exception $e) {
                    echo 'Erro ao processar o cadastro: ' . $e->getMessage(); 
                } 
            }



            include_once '../app/views/amigos.php';

        }else{
            header('Location: /login');
        }   
    }

    

    
}