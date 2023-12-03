<?php 

class LoginModel extends Database {
    private $table = 'users';

    public function getUserByEmail($email) {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE email = :email');
        $this->bind(':email', $email);
        $row = $this->single();
        return $row;
    }
    public function getNavView($role)
{
    switch ($role) {
        case 'super_admin':
            return 'layouts/navSuperadmin';
        case 'admin':
            return 'layouts/navAdmin';
        case 'Doctor':
            return 'layouts/navDoctor';
        default:
            return 'layouts/navPatient';
    }
}
}


