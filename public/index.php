<?php

// Carregar o autoload do Composer, se estiver usando
// require __DIR__ . '/../vendor/autoload.php';

// Requer o arquivo de configuração do banco de dados
require __DIR__ . '/../config/conexao.php';

// Requer os arquivos das classes/modelos e controladores
require __DIR__ . '/../app/Models/UserModel.php';
require __DIR__ . '/../app/Controllers/HomeController.php';

// Verificar a rota solicitada
$route = isset($_GET['route']) ? $_GET['route'] : '/';

// Definir as rotas
switch ($route) {
    case '/':
        $controller = new HomeController();
        $controller->index();
        break;
    case '/about':
        $controller = new HomeController();
        $controller->about();
        // Lógica para a rota about
        break;
    // Mais rotas podem ser adicionadas conforme necessário
    default:
        // Rota padrão para erro 404
        http_response_code(404);
        echo 'Página não encontrada';
        break;
}