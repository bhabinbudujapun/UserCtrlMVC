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
        $gender = $data['gender'];
        $email = $data['email'];
        $address = $data['address'];
        $marital_status = $data['marital_status'];
        $created_at = date("Y-m-d H:i:s");

        $this->dbh->query('INSERT INTO users (name, gender, email, address, marital_status, created_at) VALUES (:name, :gender, :email, :address, :marital_status, :created_at)');
        $this->dbh->bind(':name', $name);
        $this->dbh->bind(':gender', $gender);
        $this->dbh->bind(':email', $email);
        $this->dbh->bind(':address', $address);
        $this->dbh->bind(':marital_status', $marital_status);
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
            if ($password == $db_password) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
