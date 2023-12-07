<?php 
class DoctorModel extends Database {
    private $table = 'doctors';


    public function getAllDoctor() {
        $this->query('SELECT doctors.id, doctors.first_name, doctors.last_name , doctors.specialty,doctors.contact, users.email FROM ' . $this->table . ' JOIN users ON doctors.user_id = users.id');

        return $this->resultSet();
    }

    public function getDoctorById($id) {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createDoctor($data, $userId) {

        $this->query('INSERT INTO ' . $this->table . ' (user_id, first_name, last_name, contact, specialty) VALUES (:user_id, :first_name, :last_name, :contact, :specialty)');
        $this->bind(':user_id', $userId);
        $this->bind(':first_name', $data['first_name']);
        $this->bind(':last_name', $data['last_name']);
        $this->bind(':contact', $data['contact']);
        $this->bind(':specialty', $data['specialty']);
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


    public function deleteDoctor($id) {
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }
    
    
}
?>