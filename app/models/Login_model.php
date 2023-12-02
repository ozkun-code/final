<?php 

class LoginModel extends Database {
    private $table = 'users';

    public function getUserByEmail($email) {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->bind(':email', $email);
        $row = $this->single();
        return $row;
    }
}
