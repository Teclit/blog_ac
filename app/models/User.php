<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (userName, userEmail, userPassword) VALUES(:userName, :userEmail, :userPassword)');

        //Bind values
        $this->db->bind(':userName', $data['userName']);
        $this->db->bind(':userEmail', $data['userEmail']);
        $this->db->bind(':userPassword', $data['userPassword']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($userName, $userPassword) {
        $this->db->query('SELECT * FROM users WHERE userName = :userName');

        //Bind value
        $this->db->bind(':userName', $userName);
        $row = $this->db->single();
        $hashedPassword = $row->userPassword;
        if (password_verify($userPassword, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Find user by userEmail. userEmail is passed in by the Controller.
    public function findUserByEmail($userEmail) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE userEmail = :userEmail');

        //userEmail param will be binded with the userEmail variable
        $this->db->bind(':userEmail', $userEmail);

        //Check if userEmail is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
