<?php 
include '../config/Conexao.php';


class PublicoModel{
    private $idPublico;
    private $idUsuario;
    private $nomePublico;
    private $ativo;
    public $publico='';

    


    public function getIdPublico(){
        return $this->idPublico;
    }
    public function setIdPublico($idPublico){
        $this->idPublico = $idPublico;
    }


    public function getIdUsuario() {
        return $this->idUsuario;
    }
   
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }



    public function getNomePublico(){
        return $this->nomePublico;
    }
    public function setNomePublico($nomePublico){
        $this->nomePublico = $nomePublico;
    }


    



    public function getAtivo(){
        return $this->ativo;
    }
    public function setAtivo($ativo){
        $this->ativo = $ativo;
    }



    public function incluir() {
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();

        $sql = "INSERT INTO publico (nomePublico, ativo, idUsuario) VALUES (:nomePublico, :ativo, :idUsuario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nomePublico', $this->getNomePublico());
        $stmt->bindValue(':ativo', $this->getAtivo());
        $stmt->bindValue(':idUsuario', $this->getIdUsuario());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!!!');</script>";
        } else {
            echo "<script>alert('Erro: não foi possível realizar o cadastro!!!');</script>";
        }

        echo "<script>location.href='../controller/publicoController.php?op=listar';</script>";

    }

    public function listarPublico(){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM publico WHERE ativo = 's'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function listarPublicoInativo(){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM publico WHERE ativo = 'n'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function buscarPorId($idPublico){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM publico WHERE idPublico = :idPublico";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['idPublico' => $idPublico]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function alterar() {
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();

        $sql = "UPDATE publico SET nomePublico = :nomePublico, ativo = :ativo WHERE idPublico = :idPublico";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nomePublico', $this->getNomePublico());
        $stmt->bindValue(':ativo', $this->getAtivo());
        $stmt->bindValue(':idPublico', $this->getIdPublico());
       

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('alteração realizado com sucesso!!!');</script>";
        } else {
            echo "<script>alert('Erro: não foi possível realizar a alteração!!!');</script>";
        }

        echo "<script>location.href='../controller/publicoController.php?op=listar';</script>";

    }



}


?>