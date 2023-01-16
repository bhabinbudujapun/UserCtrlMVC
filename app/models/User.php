<?php
class User
{
    private $dbh;
    public function __construct()
    {
        $this->dbh = new Database;
    }

    public function getUsers()
    {
        $this->dbh->query("SELECT * FROM user");
        $result = $this->dbh->resultSet();
        return $result;
    }
    public function addUser($data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $gender = $data['gender'];
        $address = $data['address'];
        $marital_status = $data['marital_status'];
        $created_at = date("Y-m-d H:i:s");

        $this->dbh->query("INSERT INTO user (name, email, address, gender, marital_status, created_at) VALUES  (:name, :email, :address, :gender, :marital_status, :created_at)");
        $this->dbh->bind(':name', $name);
        $this->dbh->bind(':email', $email);
        $this->dbh->bind(':address', $address);
        $this->dbh->bind(':gender', $gender);
        $this->dbh->bind(':marital_status', $marital_status);
        $this->dbh->bind(':created_at', $created_at);
        if ($this->dbh->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function editUser($data)
    {
        foreach ($data as $value) {
            echo $value . '<br>';
        }
    }

    public function deleteUser($id)
    {
        $this->dbh->query("DELETE FROM user WHERE id=:id");
        $this->dbh->bind(':id', $id);
        if ($this->dbh->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
