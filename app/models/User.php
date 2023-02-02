<?php
class User extends Basemodal
{
    public $table = 'user';
    public function __construct()
    {
        $this->dbtable = $this->table;
        $user = new Database();
        $this->conn = $user->dbh;
    }

    // public function getNames($name)
    // {
    //     $this->dbh->query("SELECT * FROM user WHERE name='$name'");
    //     $result = $this->dbh->resultSet();
    //     $total_page = 0;
    //     $prev = 'disabled';
    //     $next = 'disabled';
    //     $args = 0;
    //     $data = array(
    //         $result,
    //         array($total_page, $args, $prev, $next),
    //     );
    //     return $data;
    // }

    // public function getSingleUser($id)
    // {
    //     $this->dbh->query("SELECT * FROM user WHERE id = :id");
    //     $this->dbh->bind(':id', $id);

    //     $result = $this->dbh->singleResult();
    //     return $result;
    // }

    // public function addUser($data)
    // {
    //     $name = $data['name'];
    //     $email = $data['email'];
    //     $gender = $data['gender'];
    //     $address = $data['address'];
    //     $marital_status = $data['marital_status'];
    //     $created_at = date("Y-m-d H:i:s");

    //     $this->dbh->query("INSERT INTO user (name, email, address, gender, marital_status, created_at) VALUES  (:name, :email, :address, :gender, :marital_status, :created_at)");
    //     $this->dbh->bind(':name', $name);
    //     $this->dbh->bind(':email', $email);
    //     $this->dbh->bind(':address', $address);
    //     $this->dbh->bind(':gender', $gender);
    //     $this->dbh->bind(':marital_status', $marital_status);
    //     $this->dbh->bind(':created_at', $created_at);
    //     if ($this->dbh->execute()) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }
}
