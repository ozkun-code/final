<?php 
class Doctor_model extends Database {
    private $table = 'doctors';


    public function getAllDoctor() {
        $this->query('SELECT doctors.id, doctors.first_name, doctors.last_name , doctors.specialty,doctors.contact, doctors.status_account, users.email FROM ' . $this->table . ' JOIN users ON doctors.user_id = users.id');

        return $this->resultSet();
    }

    public function getDoctorById($id) {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createDoctor($data, $userId) {

        $this->query('INSERT INTO ' . $this->table . ' (user_id, first_name, last_name, contact, specialty, status_account) VALUES (:user_id, :first_name, :last_name, :contact, :specialty, :status_account)');
        $this->bind(':user_id', $userId);
        $this->bind(':first_name', $data['first_name']);
        $this->bind(':last_name', $data['last_name']);
        $this->bind(':contact', $data['contact']);
        $this->bind(':specialty', $data['specialty']);
        $this->bind(':status_account', true);
        $this->execute();
        return $this->rowCount();
    }
    
    
    public function updateDoctor($id, $data) {

    $this->query('UPDATE ' . $this->table . ' SET first_name = :first_name, last_name = :last_name, contact = :contact, specialty = :specialty WHERE id = :id');
    $this->bind(':id', $id);
    $this->bind(':first_name', $data['first_name']);
    $this->bind(':last_name', $data['last_name']);
    $this->bind(':contact', $data['contact']);
    $this->bind(':specialty', $data['specialty']);
    $this->execute();
    return $this->rowCount();
}


public function deleteDoctor($doctor_id) {
    // Dapatkan user_id dari tabel dokter berdasarkan doctor_id
    $this->query('SELECT user_id FROM doctors WHERE id = :id');
    $this->bind(':id', $doctor_id);
    $user_id = $this->single();

    // Update status di tabel dokter
    $this->query('UPDATE doctors SET status_account = FALSE WHERE id = :id');
    $this->bind(':id', $doctor_id);
    $this->execute();

    // Update status di tabel pengguna
    $this->query('UPDATE users SET status_account = FALSE WHERE id = :id');
    $this->bind(':id', $user_id['user_id']);
    $this->execute();

    return $this->rowCount();
}

    
  
}

?>