<?php

class User {
    private $db;
    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $email;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $result = $this->db->query($sql);
        return mysqli_fetch_assoc($result);
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->db->query($sql);
        return mysqli_fetch_assoc($result);
    }

    public function createUser($first_name, $last_name, $address, $country, $gender, $skills, $username, $password, $image = null) {
        $skills = !empty($skills) ? implode(",", $skills) : "";
        
        $sql = "INSERT INTO users 
                (first_name, last_name, address, country, gender, skills, username, password_hash, profile_image)
                VALUES 
                ('$first_name', '$last_name', '$address', '$country', '$gender', '$skills', '$username', '$password', '$image')";
        
        return $this->db->query($sql);
    }

    public function updateUser($id, $first_name, $last_name, $address, $country, $gender, $skills) {
        $skills = !empty($skills) ? implode(",", $skills) : "";
        
        $sql = "UPDATE users 
                SET first_name='$first_name', last_name='$last_name', address='$address', 
                    country='$country', gender='$gender', skills='$skills'
                WHERE id='$id'";
        
        return $this->db->query($sql);
    }

    // Delete user
    public function deleteUser($id) {
        $sql = "DELETE FROM users WHERE id = '$id'";
        return $this->db->query($sql);
    }
}

?>
