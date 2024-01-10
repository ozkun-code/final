<?php
class AdminModel extends Database
{
    private $table = 'admins';

    public function getAllAdmin()
    {
        $this->query('SELECT admins.id, admins.user_id, admins.first_name, admins.last_name, admins.contact, admins.status_account, users.email FROM ' . $this->table . ' JOIN users ON admins.user_id = users.id WHERE admins.status_account = TRUE');
        return $this->resultSet();
    }

    public function getAdminById($id)
    {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }
    public function getAdminByUserId($user_id)
{
    $this->query('SELECT * FROM ' . $this->table . ' WHERE user_id = :user_id');
    $this->bind(':user_id', $user_id);
    return $this->single();
}


    public function createAdmin($data, $userId)
    {
       
        $this->query('INSERT INTO ' . $this->table . ' (user_id, first_name, last_name, contact, status_account) VALUES (:user_id, :first_name, :last_name, :contact, :status_account)');
        $this->bind(':user_id', $userId);
        $this->bind(':first_name', $data['first_name']);
        $this->bind(':last_name', $data['last_name']);
        $this->bind(':contact', $data['contact']);
        $this->bind(':status_account', true);
        $this->execute();
        return $this->rowCount();
    }

    public function updateAdmin($id, $data)
    {
        $this->query('UPDATE ' . $this->table . ' SET first_name = :first_name, last_name = :last_name, contact = :contact WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':first_name', $data['first_name']);
        $this->bind(':last_name', $data['last_name']);
        $this->bind(':contact', $data['contact']);
        $this->execute();
        return $this->rowCount();
    }

    public function deleteAdmin($id)
    {
        $this->query('UPDATE ' . $this->table . ' SET status_account = FALSE WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }

}
?>
