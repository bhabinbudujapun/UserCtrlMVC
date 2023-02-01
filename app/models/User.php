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

    // public function getUsers($args)
    // {
    //     // Checking Initial Parameters
    //     if ($args == 0) {
    //         $args = 1;
    //     }

    //     $limit = 3;
    //     $start_page = $args;

    //     $total_records = $this->getTotalRecords();

    //     $total_page = ceil($total_records / $limit);
    //     $start_page = $args;

    //     if (1 < $start_page && $start_page < $total_page) {
    //         $start_page = ($start_page * $limit) - $limit;
    //     } elseif ($start_page >= $total_page) {
    //         $start_page = ($total_page - 1) * $limit;
    //     } else {
    //         $start_page = 0;
    //     }

    //     $this->dbh->query("SELECT * FROM user LIMIT $start_page, $limit");
    //     $result = $this->dbh->resultSet();

    //     if ($args > $total_page || $args < 1) {
    //         $args = $total_page;
    //     }

    //     // For Previous Button
    //     if ($args == 1) {
    //         $prev = 'disabled';
    //     } else {
    //         $prev = 'active';
    //     }

    //     // For Next Button
    //     if ($args == $total_page) {
    //         $next = 'disabled';
    //     } else {
    //         $next = 'active';
    //     }

    //     $data = array(
    //         $result,
    //         array($total_page, $args, $prev, $next),
    //     );
    //     return $data;
    // }

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

    // public function getTotalRecords()
    // {
    //     $this->dbh->query("SELECT * FROM user");
    //     $total = $this->dbh->totalRecords();
    //     return $total;
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
