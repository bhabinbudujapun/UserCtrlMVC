<?php
// include './Database.php';

class Basemodal
{
    public $conn;
    public $dbtable;

    // private $stmt;

    public function add()
    {
        echo 'ADD USER';
        $functions = get_defined_functions();
        var_dump($functions['user']);
        die();
    }

    public function view($arg)
    {
        $limit = 3;
        $start_page = $arg;
        $total_page = 3;
        $prev = 'disabled';
        $next = 'disabled';

        $stmt = $this->conn->prepare("SELECT * FROM  $this->dbtable LIMIT $start_page, $limit");
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
        // var_dump($result);
        // die;
        $data = array(
            $result,
            array($total_page, $arg, $prev, $next),
        );
        return $data;
        // die;
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
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function viewSingle($email, $password) //viewSingle
    {
        // echo 'LOGIN USER';
        // $functions = get_defined_functions();
        // var_dump($functions['user']);
        // die();

        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_OBJ);
        if ($result) {
            $db_password = $result->password;
            if (password_verify($password, $db_password)) {
                return $result;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // public function getTotalRecords()
    // {
    //     $this->dbh->query("SELECT * FROM user");
    //     $total = $this->dbh->totalRecords();
    //     return $total;
    // }
}
