# Projeto Agenda Virtual
## Visão Geral
O Projeto Agenda Virtual é uma aplicação web desenvolvida para ajudar os usuários a gerenciar seus contatos, sejam eles amigos ou empresas. Este sistema é um CRUD (Create, Read, Update, Delete), permitindo que os usuários cadastrem, visualizem, editem e excluam seus contatos. Cada usuário pode acessar apenas os contatos que ele próprio registrou, garantindo a privacidade e a segurança dos dados. Além disso, os usuários podem personalizar suas configurações e atualizar suas senhas através de uma interface amigável.

A ideia de desenvolvimento deste projeto foi inicialmente concebida no Instituto Federal de São Paulo (IFSP), como parte de um curso técnico. Eu levei a ideia adiante e finalizei o projeto, implementando funcionalidades adicionais e aprimorando a aplicação.

## Funcionalidades

* Login e Cadastro: Os usuários devem se cadastrar ou fazer login para acessar o site. Este sistema de autenticação garante que cada usuário tenha acesso apenas às suas próprias informações e contatos.

* Gerenciamento de Contatos Específico para Usuários: Cada usuário pode visualizar e gerenciar apenas os contatos que ele registrou, garantindo a privacidade das informações pessoais e comerciais.

* Funcionalidade CRUD: Os usuários podem criar novos contatos, visualizar detalhes de contatos existentes, atualizar suas informações e excluí-los se necessário.

* Configuração do Usuário: Os usuários têm acesso a uma página de configurações onde podem atualizar suas informações de perfil e alterar sua senha.

* Interface de Usuário Aprimorada: A aplicação utiliza a biblioteca de ícones Font Awesome para uma interface moderna e visualmente atraente. O Sweet Alert é integrado para fornecer alertas e notificações elegantes, melhorando a experiência do usuário.

## Tecnologias Utilizadas

* PHP: A lógica central e as funcionalidades de backend da aplicação são construídas usando PHP puro, garantindo uma arquitetura robusta e escalável.

* Font Awesome: Esta biblioteca é utilizada para ícones em toda a aplicação, contribuindo para um visual limpo e profissional.

* Sweet Alert: O Sweet Alert é implementado para criar mensagens de alerta responsivas e estilizadas, aprimorando a interação do usuário.

## Estrutura do Projeto

O projeto está estruturado em várias views principais, cada uma servindo a um propósito específico:

1. Home
* Descrição: A página inicial é o ponto de entrada da aplicação, onde os usuários acessam outras partes da aplicação.

![image](https://github.com/user-attachments/assets/0173778e-36a6-4898-ab0b-63df9c9c2398)

2. Amigos
* Descrição: A página "Amigos" é onde os usuários podem gerenciar seus contatos pessoais.

* Funcionalidade: Os usuários podem adicionar, visualizar, atualizar ou excluir contatos que são classificados como amigos.

![image](https://github.com/user-attachments/assets/21f2500d-7b91-48f9-b6e2-b002847249ba)

3. Comercios
* Descrição: A página "Comercios" é dedicada ao gerenciamento de contatos comerciais.

* Funcionalidade: Semelhante à view "Amigos", esta seção permite que os usuários gerenciem contatos de empresas separadamente.

![image](https://github.com/user-attachments/assets/25a26842-8bec-4ec3-8485-079eba1fa829)

4. Configurações
* Descrição: A página "Configurações" permite que os usuários modifiquem suas configurações pessoais.

* Funcionalidade: Os usuários podem atualizar suas informações de perfil, como email ou nome de exibição, e alterar sua senha.

![image](https://github.com/user-attachments/assets/844703e8-1fda-476a-9921-3880f681d35c)

## Instalação e Configuração

### Pré-requisitos

* Um servidor web com suporte a PHP (ex.: Apache, Nginx).
  
* Banco de dados MySQL para armazenar informações de usuários e contatos.
  
### Passos para Instalar
1. Clone o repositório

 ``` git clone https://github.com/araujo-leo/agenda.git ``` 

3. Navegue até o diretório do projeto:

``` cd agenda ```

4. Configure o banco de dados: Importe o arquivo SQL fornecido para criar as tabelas necessárias.

5. Configure a aplicação: Atualize as configurações de conexão com o banco de dados no arquivo config.php.
   
6. Execute a aplicação: Certifique-se de que o servidor está rodando e navegue até a aplicação em seu navegador.
