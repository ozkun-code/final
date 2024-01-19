<?php

class Login_model extends Database
{
    private $table = 'users';

    public function getUserByEmail($email)
    {
        $this->query("SELECT * FROM " . $this->table . " WHERE email = :email");
        $this->bind(':email', $email);
        $this->execute();
        if ($this->rowCount() > 0) {
            return $this->single();
        } else {
            return false;
        }
    }

    public function isEmailExists($email)
    {
        $this->query("SELECT * FROM " . $this->table . " WHERE email = :email");
        $this->bind(':email', $email);
        $this->execute();
        return $this->rowCount();
    }

    public function createUser($email, $password, $role)
    {
        $this->query('INSERT INTO ' . $this->table . ' (email, password, role) VALUES (:email, :password, :role)');
        $this->bind(':email', $email);
        $this->bind(':password', $password);
        $this->bind(':role', $role);
        $this->execute();
    }
    public function getUserById($user_id)
    {
        $this->query('SELECT id, email, password, role, status_account FROM users WHERE id = :user_id');
        $this->bind(':user_id', $user_id);
        return $this->single();
    }



    public function getNavView($role)
    {
        switch ($role) {
            case 'super_admin':
                return 'layouts/navsuperadmin';
            case 'admin':
                return 'layouts/navadmin';
            case 'doctor':
                return 'layouts/navdoctors';
            default:
                return 'layouts/navpatient';
        }
    }
    public function updateUser($user_id, $email, $password)
{
    $this->query('UPDATE users SET email = :email, password = :password WHERE id = :user_id');
    $this->bind(':user_id', $user_id);
    $this->bind(':email', $email);
    $this->bind(':password', $password);
    $this->execute();
}
}
