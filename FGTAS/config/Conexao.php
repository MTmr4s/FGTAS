<?php


class Conexao {
    private $host = 'localhost:3306';
    private $db_name = 'atendimentos';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function fazConexao() {
        $this->conn = null;
        try {
            $this->conn = new \PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Erro de Conexão: " . $e->getMessage();
        }

        return $this->conn;
       
    }
}
?>
