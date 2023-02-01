<?php
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    public $dbh;

    public function __construct()
    {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    // Prepare statement with query
    // public function query($sql)
    // {
    //     return $this->stmt = $this->dbh->prepare($sql);
    // }

    // Bind statement with query
    // public function bind($param, $value)
    // {
    //     $this->stmt->bindParam($param, $value);
    // }

    // Execute the prepared statement
    // public function execute()
    // {
    //     return $this->stmt->execute();
    // }

    // Execute and get total number of rows/records
    // public function totalRecords()
    // {
    //     $this->execute();
    //     return $this->stmt->rowCount();
    // }

    // Execute and fetch single user information
    // public function singleResult()
    // {
    //     $this->execute();
    //     return $this->stmt->fetch(PDO::FETCH_OBJ);
    // }

    // Execute and fetch all user information
    // public function resultSet()
    // {
    //     $this->execute();
    //     return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    // }
}
