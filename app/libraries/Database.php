<?php
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;

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
    public function query($sql)
    {
        $this->stmt = $this->dbh->prepare($sql);
    }

    // Bind statement with query
    public function bind($param, $value)
    {
        $this->stmt->bindValue($param, $value);
    }

    // Execute the prepared statement
    public function execute()
    {
        return $this->stmt->execute();
    }

    public function singleResult()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Get row count
    // public function rowCount()
    // {
    //     return $this->stmt->rowCount();
    // }
}
