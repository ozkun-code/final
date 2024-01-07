<?php
class PatientModel extends Database
{

    private $table = 'patients';
    private $table1 = 'kecamatan';
    private $table2 = 'desa';

    public function getAllPatient()
    {
        $this->query('SELECT patients.id, patients.first_name, patients.last_name , patients.date_of_birth, patients.contact, patients.address, users.email FROM ' . $this->table . ' JOIN users ON patients.user_id = users.id');

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
        $this->query('INSERT INTO ' . $this->table . ' (user_id, first_name, last_name, contact, address, date_of_birth, gender) VALUES (:user_id, :first_name, :last_name, :contact, :address, :date_of_birth, :gender)');
        $this->bind(':user_id', $userId);
        $this->bind(':first_name', $patient['first_name']);
        $this->bind(':last_name', $patient['last_name']);
        $this->bind(':contact', $patient['contact']);
        $this->bind(':address', $patient['address']);
        $this->bind(':gender', $patient['gender']);
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
        $this->bind(':address', $patient['address']);
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
    public function searchPatient($name)
    {
        $this->query('SELECT patients.id, patients.first_name, patients.last_name, patients.date_of_birth, patients.contact, patients.address, users.email 
                  FROM ' . $this->table . ' 
                  JOIN users ON patients.user_id = users.id 
                  WHERE patients.first_name LIKE :name OR patients.last_name LIKE :name');
        $this->bind(':name', '%' . $name . '%');
        return $this->resultSet();
    }
    public function getAllKecamatan()
    {
        $this->query('SELECT * FROM ' . $this->table1);
        return $this->resultSet();
    }
    public function getDesaByKecamatanId($kecamatanId)
    {
        $this->query('SELECT * FROM ' . $this->table2 . ' WHERE kecamatan_id = :kecamatan_id');
        $this->bind(':kecamatan_id', $kecamatanId);
        return $this->resultSet();
    }
    // Pada file model (misalnya PatientModel.php)
    public function getVillagesBySubdistrictId($subdistrictId)
    {
        $this->query('SELECT * FROM ' . $this->table2 . ' WHERE kecamatan_id = :kecamatan_id');
        $this->bind(':kecamatan_id', $subdistrictId);
        return $this->resultSet();
    }
}
