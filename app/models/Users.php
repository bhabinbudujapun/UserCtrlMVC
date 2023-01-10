<?php
class Users extends Database
{
    // Register New User
    public function register($data)
    {
        $name = $data['name'];
        $gender = $data['gender'];
        $email = $data['email'];
        $address = $data['address'];
        $marital_status = $data['marital_status'];
        $created_at = date("Y-m-d H:i:s");

        $query = 'INSERT INTO users (name,gender, email, address, marital_status, created_at) VALUES (:name, :gender, :email, :address, :marital_status, :created_at)';
        $params = array(':name' => $name, ':gender' => $gender, ':email' => $email, ':address' => $address, ':marital_status' => $marital_status, ':created_at' => $created_at);
        $stmt = $this->query($query, $params);
        // $stmt->execute();
    }
}
