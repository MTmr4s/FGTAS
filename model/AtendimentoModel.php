<?php 
    include '../config/Conexao.php';
    class AtendimentoModel{

        private $idFormaAtendimento;
        private $idPerguntaPublico;
        private $idUsuario;
        private $ativo;
        private $respostaAtendimento;
        private $idAtendimento;

        function getIdAtendimento(){
            return $this->idAtendimento;
        }
        function setIdAtendimento($idAtendimento){
            $this->idAtendimento = $idAtendimento;
        }

        function getIdFormaAtendimento(){
            return $this->idFormaAtendimento;
        }
        function setIdFormaAtendimento($idFormaAtendimento){
            $this->idFormaAtendimento = $idFormaAtendimento;
        }

        function getIdPerguntaPublico(){
            return $this->idPerguntaPublico;
        }
        function setIdPerguntaPublico($idPerguntaPublico){
            $this->idPerguntaPublico = $idPerguntaPublico;
        }

        function getIdUsuario(){
            return $this->idUsuario;
        }
        function setIdUsuario($idUsuario){
            $this->idUsuario = $idUsuario;
        }

        function getAtivo(){
            return $this->ativo;
        }
        function setAtivo($ativo){
            $this->ativo = $ativo;
        }

        function getRespostaAtendimento(){
            return $this->respostaAtendimento;
        }
        function setRespostaAtendimento($respostaAtendimento){
            $this->respostaAtendimento = $respostaAtendimento;
        }




        function listar() {
            $conexao = new Conexao();
            $conn = $conexao->fazConexao();
        

            $sqlPublico = "SELECT * FROM publico WHERE ativo = 's'";
            $stmtPublico = $conn->prepare($sqlPublico);
            $stmtPublico->execute();
            $resultadosPublico = $stmtPublico->fetchAll(\PDO::FETCH_ASSOC);
        
            $sqlFormAtendimento = "SELECT * FROM formaAtendimento WHERE ativo = 's'";
            $stmtFormAtendimento = $conn->prepare($sqlFormAtendimento);
            $stmtFormAtendimento->execute();
            $resultadosFormAtendimento = $stmtFormAtendimento->fetchAll(\PDO::FETCH_ASSOC);
        
          
            return ['publicos' => $resultadosPublico, 'formAtendimentos' => $resultadosFormAtendimento];
        }




            public function incluir() {
            $conexao = new Conexao();
            $conn = $conexao->fazConexao();
    
            $sql = "INSERT INTO atendimento (idFormaAtendimento, idPerguntaPublico, ativo, respostaAtendimento,  idUsuario) VALUES (:idFormaAtendimento, :idPerguntaPublico, :ativo, :respostaAtendimento, :idUsuario)";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':idFormaAtendimento', $this->getIdFormaAtendimento());
            $stmt->bindValue(':idPerguntaPublico', $this->getIdPerguntaPublico());
            $stmt->bindValue(':respostaAtendimento', $this->getRespostaAtendimento());
            $stmt->bindValue(':ativo', $this->getAtivo());
            $stmt->bindValue(':idUsuario', $this->getIdUsuario());
    
            $res = $stmt->execute();
    
            if ($res) {
                echo "<script>alert('Cadastro realizado com sucesso!!!');</script>";
            } else {
                echo "<script>alert('Erro: não foi possível realizar o cadastro!!!');</script>";
            }
    
            echo "<script>location.href='../index.php';</script>";
    
        }

        public function listarAtendimento(){
            $conexao = new Conexao();
            $conn = $conexao->fazConexao();
            $sql = "SELECT atendimento.*,perguntapublico.descricaoPergunta,formaatendimento.nomeAtendimento,usuario.nomeUsuario FROM atendimento LEFT JOIN perguntapublico ON atendimento.idPerguntaPublico=perguntapublico.idPerguntaPublico LEFT JOIN formaatendimento ON atendimento.idFormaAtendimento=formaatendimento.idFormaAtendimento LEFT JOIN usuario ON atendimento.idUsuario=usuario.idUsuario WHERE atendimento.ativo='s'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function listarAtendimentoInativo(){
            $conexao = new Conexao();
            $conn = $conexao->fazConexao();
            $sql = "SELECT atendimento.*,perguntapublico.descricaoPergunta,formaatendimento.nomeAtendimento,usuario.nomeUsuario FROM atendimento LEFT JOIN perguntapublico ON atendimento.idPerguntaPublico=perguntapublico.idPerguntaPublico LEFT JOIN formaatendimento ON atendimento.idFormaAtendimento=formaatendimento.idFormaAtendimento LEFT JOIN usuario ON atendimento.idUsuario=usuario.idUsuario WHERE atendimento.ativo='n'";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function alterar() {
            $conexao = new Conexao();
            $conn = $conexao->fazConexao();
    
            $sql = "UPDATE atendimento SET    ativo = :ativo WHERE idAtendimento = :idAtendimento";
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':ativo', $this->getAtivo());           
            $stmt->bindValue(':idAtendimento', $this->getIdAtendimento());           
    
            $res = $stmt->execute();
    
            if ($res) {
                echo "<script>alert('alteração realizado com sucesso!!!');</script>";
            } else {
                echo "<script>alert('Erro: não foi possível realizar a alteração!!!');</script>";
            }
    
            echo "<script>location.href='../controller/atendimentoController.php?op=listarAtendimento';</script>";
    
        }        


}

?>