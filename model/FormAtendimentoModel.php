<?php 
include '../config/Conexao.php';


class FormAtendimentoModel{
    private $idFormAtendimento;
    private $idUsuario;
    private $nomeFormAtendimento;
    private $ativo;
    public $formAtendimento='';

    


    public function getIdFormAtendimento(){
        return $this->idFormAtendimento;
    }
    public function setIdFormAtendimento($idFormAtendimento){
        $this->idFormAtendimento = $idFormAtendimento;
    }


    public function getIdUsuario() {
        return $this->idUsuario;
    }
   
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }



    public function getNomeFormAtendimento(){
        return $this->nomeFormAtendimento;
    }
    public function setNomeFormAtendimento($nomeFormAtendimento){
        $this->nomeFormAtendimento = $nomeFormAtendimento;
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

        $sql = "INSERT INTO formaatendimento (nomeAtendimento, ativo, idUsuario) VALUES (:nomeAtendimento, :ativo, :idUsuario)";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nomeAtendimento', $this->getNomeFormAtendimento());
        $stmt->bindValue(':ativo', $this->getAtivo());
        $stmt->bindValue(':idUsuario', $this->getIdUsuario());

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('Cadastro realizado com sucesso!!!');</script>";
        } else {
            echo "<script>alert('Erro: não foi possível realizar o cadastro!!!');</script>";
        }

        echo "<script>location.href='../controller/formaAtendimentoController.php?op=listar';</script>";

    }

    public function listarFormAtendimento(){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM formaatendimento WHERE ativo = 's'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public function listarFormAtendimentoInativo(){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM formaatendimento WHERE ativo = 'n'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function buscarPorId($idFormAtendimento){
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();
        $sql = "SELECT * FROM formaatendimento WHERE idFormaAtendimento = :idFormAtendimento";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['idFormAtendimento' => $idFormAtendimento]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function alterar() {
        $conexao = new Conexao();
        $conn = $conexao->fazConexao();

        $sql = "UPDATE formaatendimento SET nomeAtendimento = :nomeAtendimento, ativo = :ativo WHERE idFormaAtendimento = :idFormaAtendimento";
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':nomeAtendimento', $this->getNomeFormAtendimento());
        $stmt->bindValue(':ativo', $this->getAtivo());
        $stmt->bindValue(':idFormaAtendimento', $this->getIdFormAtendimento());
       

        $res = $stmt->execute();

        if ($res) {
            echo "<script>alert('alteração realizado com sucesso!!!');</script>";
        } else {
            echo "<script>alert('Erro: não foi possível realizar a alteração!!!');</script>";
        }

        echo "<script>location.href='../controller/formaAtendimentoController.php?op=listar';</script>";

    }



}


?>