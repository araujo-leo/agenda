<?php

require_once '../config/conexao.php';
require_once '../app/Models/UserModel.php';

class UserController {
    
    private $userModel; 

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function cadastrar() {
        if (!isset($_SESSION['login'])) {
            include_once '../app/views/auth/cadastro.php';
            if (isset($_GET['formulario_cadastro_enviado']) && $_GET['formulario_cadastro_enviado'] === 'true') {
                $dadosCadastro = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                ];
                
                try {
                    $this->processarCadastro($dadosCadastro); 
                } catch (Exception $e) {
                    echo 'Erro ao processar o cadastro: ' . $e->getMessage(); 
                }            
            }
        } else {
            header('Location: ../');
        }
    }

    private function processarCadastro($dadosCadastro) {
        $this->userModel->cadastrarUsuario($dadosCadastro);
    }

    public function login() {
        if (!isset($_SESSION['login'])) {
            include_once '../app/views/auth/login.php';
            if (isset($_GET['formulario_login_enviado']) && $_GET['formulario_login_enviado'] === 'true') {
                $dadosLogin = [
                    'email' => $_POST['email'],
                    'password' => $_POST['password']
                ];
                
                try {
                    $this->processarLogin($dadosLogin);
                } catch (Exception $e) {
                    echo 'Erro ao processar o cadastro: ' . $e->getMessage(); 
                }            
            }
        } else {
            header('Location: ../');
        }
    }

    private function processarLogin($dadosLogin) {
        $this->userModel->loginUsuario($dadosLogin);
    }

    public function logout() {
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            try {
                $this->processarLogout();
            } catch (Exception $e) {
                echo 'Erro ao processar o logout: ' . $e->getMessage(); 
            }
        } else {
            header('Location: ../');
        }
    }

    private function processarLogout() {
        session_destroy();
        header('Location: ../');
    }

    public function config() {
        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            include_once '../app/views/config.php';
        } else {
            header('Location: ../');
        }
    }

    public function updateConfig() {
        $currentUserData = $_SESSION['userData'];
        $novoNome = $_POST['nome'];
        $novoEmail = $_POST['email'];
        $senhaAtual = $_POST['password'];
        $novaSenha = $_POST['newpassword'];
        $confirmarSenha = $_POST['passwordconfirm'];
        $isModified = false;
    
        if ($novoNome !== $currentUserData['nome']) {
            $isModified = true;
        }
        if ($novoEmail !== $currentUserData['email']) {
            $isModified = true;
        }
        
        if (!empty($novaSenha) && !empty($confirmarSenha)) {
            if($senhaAtual !== $novaSenha){
                if ($novaSenha === $confirmarSenha) {
                    if (password_verify($senhaAtual, $currentUserData['senha'])) {
                        $isModified = true;
                    } else {
                        header('Location: /configurações');
                        $_SESSION['error_message'] = "Senha atual incorreta.";
                        exit;
                    }
                } else {
                    header('Location: /configurações');
                    $_SESSION['error_message'] = "A nova senha e a confirmação da senha não coincidem.";
                    exit;
                }
            }else{
                header('Location: /configurações');
                $_SESSION['error_message'] = "A nova senha não pode ter sido utilizada anteriormente!";
                exit;
            }
            
        }
    
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $uploadDirectory = '../storage/uploads/imagens/';
            if (!is_dir($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
            }
    
            $imagePath = $uploadDirectory . basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                $isModified = true;
            } else {
                header('Location: /configurações');
                $_SESSION['error_message'] = "Erro ao fazer upload da imagem.";
                exit;
                
            }
        }
    
        if ($isModified) {
            $this->userModel->updateUser($novoNome, $novoEmail, $novaSenha, $imagePath);
            echo "Dados atualizados com sucesso.";
            header('Location: /');
        } else {
            echo "Nenhuma modificação foi feita.";
        }
    }
}
