<?php 
    include_once '../config/Conexao.php';

class AutenticaModel
{

    public static function acharUsuario($loginUsuario)
    {
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM usuario WHERE loginUsuario = :loginUsuario AND ativo = 'S'";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['loginUsuario' => $loginUsuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    

   public function incluir($nomeUsuario, $senhaUsuario, $emailUsuario, $loginUsuario, $telefoneCelular, $ativo)
   {
       $conexao = new Conexao();
       $conn = $conexao->fazConexao();
       $stmt = $conn->prepare('INSERT INTO usuario (nomeUsuario, senhaUsuario, emailUsuario, loginUsuario, telefoneCelular, ativo) VALUES (?, ?, ?, ?, ?, ?)');
       $stmt->execute([$nomeUsuario, $senhaUsuario, $emailUsuario, $loginUsuario, $telefoneCelular, $ativo]);

       
   }


   public function listarUsuario(){
    $conexao = new Conexao();
    $conn = $conexao->fazConexao();
    $sql = "SELECT * FROM usuario WHERE ativo = 's'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}

public function listarUsuarioInativo(){
    $conexao = new Conexao();
    $conn = $conexao->fazConexao();
    $sql = "SELECT * FROM usuario WHERE ativo = 'n'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
}



?>