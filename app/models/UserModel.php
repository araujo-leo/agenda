<?php 



class UserModel {
    /* private $user_id;
    private $nome;
    private $email;
    private $senha;
    private $valor_por_hora;
    private $outras_configuracoes;
    private $created_at;
    private $updated_at;

    public function __construct($user_id, $nome, $email, $senha, $valor_por_hora, $outras_configuracoes, $created_at, $updated_at) {
        $this->user_id = $user_id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->valor_por_hora = $valor_por_hora;
        $this->outras_configuracoes = $outras_configuracoes;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    } */

    public static function getAllUsers() {
        require "../config/conexao.php";
        $sql = "SELECT * FROM users";
        $resultado = $conn->query($sql);
    
        $users = array();
        while ($row = $resultado->fetch_assoc()) {
            $users[] = $row;
        }
    
        return $users;
    }




}
