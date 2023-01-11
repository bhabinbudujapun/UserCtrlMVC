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
        $password = $data['password'];
        $password_confirmation = $data['password_confirmation'];
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
