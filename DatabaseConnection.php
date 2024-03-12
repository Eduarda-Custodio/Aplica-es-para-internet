<?php 

class DatabaseConnection {
    private static $instance; 
    private $dsn;
    private $username;
    private $password;
    private $options;
    private $pdo;

    
    private function __construct($dsn, $username, $password, $options) {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->password = $password;
        $this->options = $options;
    }

  
    public static function getInstance($dsn, $username, $password, $options) {
        if (!self::$instance) {
            self::$instance = new self($dsn, $username, $password, $options);
        }
        return self::$instance;
    }

    
    public function connect() {
        try {
            $this->pdo = new PDO($this->dsn, $this->username, $this->password, $this->options);
            echo "Conexão estabelecida com sucesso!\n";
        } catch (PDOException $e) {
            echo"Erro na conexão: " . $e->getMessage();
        }
    }

    public function query($sql) {
        
        return $this->pdo->query($sql);
        
    }
}
