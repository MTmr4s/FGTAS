<?php 
include '../config/Conexao.php';


class PerguntaModel{
    private $idPublico;
    private $idUsuario;
    private $idPergunta;
    private $descricaoPergunta;
    private $ativo;
    public $pergunta='';

    


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

    public function getIdPergunta() {
        return $this->idPergunta;
    }
   
    public function setIdPergunta($idPergunta){
        $this->idPergunta = $idPergunta;
    }



    public function getDescricaoPergunta(){
        return $this->descricaoPergunta;
    }
    public function setDescricaoPergunta($descricaoPergunta){
        $this->descricaoPergunta = $descricaoPergunta;
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

        $sql = "INSERT INTO perguntapublico (idPublico, descricaoPergunta, ativo, idUsuario) VALUES (:idPublico, :descricaoPergunta, :ativo, :idUsuario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':idPublico', $this->getIdPublico());
        $stmt->bindValue(':ativo', $this->getAtivo());
        $stmt->bindValue(':idUsuario', $this->getIdUsuario());
        $stmt->bindValue(':descricaoPergunta', $this->getDescricaoPergunta());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!!!');</script>";
        } else {
            echo "<script>alert('Erro: não foi possível realizar o cadastro!!!');</script>";
        }

        echo "<script>location.href='../controller/perguntaPublicoController.php?op=listar&idPublico=".$this->getIdPublico()."';</script>";


    }

    public function listarPergunta($idPublico){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM perguntapublico WHERE ativo = 's' AND  idPublico = $idPublico";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function listarPerguntaInativo($idPublico){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM perguntapublico WHERE ativo = 'n' AND  idPublico = $idPublico";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function buscarPorId($idPergunta){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM perguntapublico WHERE idPerguntaPublico = :idPergunta";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['idPergunta' => $idPergunta]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function alterar() {
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();

        $sql = "UPDATE perguntapublico SET descricaoPergunta = :descricaoPergunta, ativo = :ativo WHERE idPerguntaPublico = :idPergunta";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':descricaoPergunta', $this->getDescricaoPergunta());
        $stmt->bindValue(':ativo', $this->getAtivo());
        $stmt->bindValue(':idPergunta', $this->getIdPergunta());
       

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('alteração realizado com sucesso!!!');</script>";
        } else {
            echo "<script>alert('Erro: não foi possível realizar a alteração!!!');</script>";
        }

        echo "<script>location.href='../controller/perguntaPublicoController.php?op=listar&idPublico=".$this->getIdPublico()."';</script>";

    }



}


?>