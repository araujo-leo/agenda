<?php

require_once '../config/conexao.php';
require_once '../app/Models/AmigosModel.php';



class AmigosController {
    private $AmigosModel; 

    public function __construct() {
        $this->AmigosModel = new AmigosModel();
    }

    public function index() {    
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $amigos = [];

            if (isset($_POST['nome_amigo']) && !empty($_POST['nome_amigo'])) {
                $nomeAmigo = $_POST['nome_amigo'];
                try {
                    $amigos = $this->AmigosModel->procurarAmigo($nomeAmigo);
                    if (empty($amigos)) {
                        $_SESSION['error_message'] = "Nenhum amigo encontrado com o nome '{$nomeAmigo}'.";
                    }
                } catch (Exception $e) {
                    echo 'Erro ao procurar amigo: ' . $e->getMessage(); 
                }
            } else {
                $amigos = $this->AmigosModel->getAllAmigos();
            }

            if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['tel']) && isset($_POST['datanasc'])) {
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
        } else {
            header('Location: ../public/login');
        }   
    }

    public function updateAmigo(){
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            // Obtendo o amigo a ser editado
            $amigos = $this->AmigosModel->getAllAmigos();
            $amigocorreto = null;

            foreach ($amigos as $amigo) {
                if ($amigo['cod'] == $_POST['cod']) {
                    $amigocorreto = $amigo;
                    break;
                }
            }
            
            if ($amigocorreto) {
                $novoNome = $_POST['nome'];
                $novoEmail = $_POST['email'];
                $novoTel = $_POST['tel'];
                $novoDataNasc = $_POST['datanasc'];

                $isModified = false;

                if ($novoNome !== $amigocorreto['nome'] || $novoEmail !== $amigocorreto['email'] || 
                    $novoTel !== $amigocorreto['tel'] || $novoDataNasc !== $amigocorreto['datanasc']) {
                    $isModified = true;
                }

                if ($isModified) {
                    $this->AmigosModel->updateAmigo($amigocorreto['cod'], $novoNome, $novoEmail, $novoTel, $novoDataNasc);
                    echo "Dados atualizados com sucesso.";
                    header('Location: amigos');
                } else {
                    $_SESSION['error_message'] = "Nenhuma modificação foi feita!";
                    header('Location: amigos');
                }
            }
        } else {
            header('Location: ../public/login');
        } 
    }

    public function deleteAmigo() {
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            if (isset($_GET['id'])) {
                $id = intval($_GET['id']);
                $this->AmigosModel->deleteAmigo($id);
            } else {
                $_SESSION['error_message'] = "OPS! Algo ocorreu inesperadamente.";
                header('Location: amigos');
                exit;
            }
        } else {
            header('Location: ../public/login');
        } 
    }
}
