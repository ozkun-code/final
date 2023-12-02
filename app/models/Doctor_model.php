<?php 
class Doctor_model extends Database {
    private $table = 'doctors';

    public function getAllDoctor() {
        $this->query('SELECT doctors.id, doctors.name, doctors.specialty, users.email FROM ' . $this->table . ' JOIN users ON doctors.user_id = users.id');

        return $this->resultSet();
    }

    public function getDoctorById($id) {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createDoctor($data) {
        // Masukkan data ke dalam tabel user
        $this->query('INSERT INTO users (username, password, email, role) VALUES (:username, :password, :email, :role)');
        $this->bind(':username', $data['name']); // asumsi username sama dengan name
        $this->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->bind(':email', $data['email']);
        $this->bind(':role', 'doctor');
        $this->execute();
    
        // Dapatkan ID dari user yang baru saja dibuat
        $userId = $this->dbh->lastInsertId();
    
        // Masukkan data ke dalam tabel doctors
        $this->query('INSERT INTO ' . $this->table . ' (user_id, name) VALUES (:user_id, :name)');
        $this->bind(':user_id', $userId);
        $this->bind(':name', $data['name']);
        $this->execute();
    }
    
    public function updateDoctor($id, $data) {
        // Perbarui data di tabel user
        $this->query('UPDATE users SET username = :username, password = :password, email = :email WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':username', $data['name']); // asumsi username sama dengan name
        $this->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->bind(':email', $data['email']);
        $this->execute();
    
        // Perbarui data di tabel doctors
        $this->query('UPDATE ' . $this->table . ' SET name = :name WHERE user_id = :user_id');
        $this->bind(':user_id', $id);
        $this->bind(':name', $data['name']);
        $this->execute();
    }
    

    public function deleteDoctor($id) {
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
    }
}
?>