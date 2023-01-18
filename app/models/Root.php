<?php
class Root
{
    private $dbh;
    public function __construct()
    {
        $this->dbh = new Database();
    }

    // Register New User
    public function register($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        // $password  = $data['password'];
        $created_at = date("Y-m-d H:i:s");

        $this->dbh->query('INSERT INTO admin (name, email, password, created_at) VALUES (:name, :email, :password, :created_at)');
        $this->dbh->bind(':name', $name);
        $this->dbh->bind(':email', $email);
        $this->dbh->bind(':password', $password);
        $this->dbh->bind(':created_at', $created_at);

        if ($this->dbh->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Login User
    public function login($email, $password)
    {
        $this->dbh->query('SELECT * FROM admin WHERE email = :email');
        $this->dbh->bind(':email', $email);

        $row = $this->dbh->singleResult();
        if (!empty($row)) {
            $db_password = $row->password;
            if (password_verify($password, $db_password)) {
                // if ($db_password == $password) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
