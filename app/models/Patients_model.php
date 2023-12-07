<?php 
class PatientModel extends Database {

    private $table = 'patients';

    public function getAllPatient() 
    {
        $this->query('SELECT patients.id, patients.first_name, patients.last_name , patients.date_of_birth, patients.contact, patients.addres, users.email FROM ' . $this->table . ' JOIN users ON patients.user_id = users.id');

        return $this->resultSet();
    }

    public function getPatientById($id) 
    {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createPatient($patient, $userId) 
    {       
        $this->query('INSERT INTO ' . $this->table . ' (user_id, first_name, last_name, contact, addres, date_of_birth) VALUES (:user_id, :first_name, :last_name, :contact, :addres, :date_of_birth)');
        $this->bind(':user_id', $userId);
        $this->bind(':first_name', $patient['first_name']);
        $this->bind(':last_name', $patient['last_name']);
        $this->bind(':contact', $patient['contact']);
        $this->bind(':addres', $patient['addres']);
        $this->bind(':date_of_birth', $patient['date_of_birth']);
        $this->execute();
        return $this->rowCount();
    }
    
    
    public function updatePatient($id, $patient) 
    {   
        $this->query('UPDATE ' . $this->table . ' SET first_name = :first_name, last_name = :last_name, contact = :contact, addres = :addres, date_of_birth = :date_of_birth WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':first_name', $patient['first_name']);
        $this->bind(':last_name', $patient['last_name']);
        $this->bind(':contact', $patient['contact']);
        $this->bind(':addres', $patient['addres']);
        $this->bind(':date_of_birth', $patient['date_of_birth']);
        $this->execute();
        return $this->rowCount();
    }

    public function deletePatient($id) 
    {
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }
    
    
}
?>
