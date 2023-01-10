<?php
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    protected $dbh;
    protected $stmt;

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
    public function query($sql, $params)
    {
        $this->stmt = $this->dbh->prepare($sql);
        if (!empty($params)) {
            foreach ($params as $param => $value) {
                $this->stmt->bindValue($param, $value);
            }
        }
        // return $this->stmt;
        // $this->stmt->$this->execute();
        $this->stmt->execute();
    }

    // Execute the prepared statement
    // public function execute()
    // {
    //     $this->stmt->execute();
    // }

    // Get row count
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}
