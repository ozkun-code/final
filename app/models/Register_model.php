<?php 

class UserModel extends Database {
    private $table = 'users';

    public function createUser($email, $password, $role) {
        $this->query('INSERT INTO ' . $this->table . ' (email, password, role) VALUES (:email, :password, :role)');
        $this->bind(':email', $email);
        $this->bind(':password', $password);
        $this->bind(':role', $role);
        $this->execute();
    
    }
}

