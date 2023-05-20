 <?php

class Dbh {
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'autorepairshop';
  
    protected function connect() {
        $dsn = "mysql:host=$this->host;dbname=$this->database";

        try {
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            // Handle the connection error appropriately
            die('Connection failed: ' . $e->getMessage());
        }
    }
}

?>