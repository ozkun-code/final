<?php
class AdminModel extends Database
{
    private $table = 'admins'; // Change the table name to 'admin'

    public function getAllAdmin()
    { // Change the method name to getAllAdmin
        $this->query('SELECT admins.id, admins.user_id, admins.first_name, admins.last_name, admins.contact,users.email FROM ' . $this->table . ' JOIN users ON admins.user_id = users.id');
        return $this->resultSet();
    }

    public function getAdminById($id)
    { // Change the method name to getAdminById
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createAdmin($data, $userId)
    { // Change the method name to createAdmin
        $this->query('INSERT INTO ' . $this->table . ' (user_id, first_name, last_name, contact) VALUES (:user_id, :first_name, :last_name, :contact)');
        $this->bind(':user_id', $userId);
        $this->bind(':first_name', $data['first_name']);
        $this->bind(':last_name', $data['last_name']);
        $this->bind(':contact', $data['contact']);
        $this->execute();
        return $this->rowCount();
    }

    public function updateAdmin($id, $data)
    { // Change the method name to updateAdmin
        $this->query('UPDATE ' . $this->table . ' SET first_name = :first_name, last_name = :last_name, contact = :contact WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':first_name', $data['first_name']);
        $this->bind(':last_name', $data['last_name']);
        $this->bind(':contact', $data['contact']);
        $this->execute();
        return $this->rowCount();
    }

    public function deleteAdmin($id)
    { // Change the method name to deleteAdmin
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }
}
