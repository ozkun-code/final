<?php
class PatientModel extends Database
{

    private $table = 'patients';
    private $table1 = 'kecamatan';
    private $table2 = 'desa';

    public function getAllPatient()
{
    $this->query('SELECT patients.id, patients.user_id, patients.kecamatan_id, patients.desa_id, patients.first_name, patients.last_name, patients.gender, patients.contact, patients.address, patients.date_of_birth,patients.status_account, kecamatan.name as kecamatan_name, desa.name as desa_name, users.id as user_id, users.email as user_email, users.password as user_password, users.role as user_role
                  FROM ' . $this->table . ' 
                  JOIN kecamatan ON patients.kecamatan_id = kecamatan.id 
                  JOIN desa ON patients.desa_id = desa.id
                  JOIN users ON patients.user_id = users.id');

    return $this->resultSet();
}

    

public function getPatientById($id)
{
    $this->query('SELECT patients.id, patients.user_id, patients.kecamatan_id, patients.desa_id, patients.first_name, patients.last_name, patients.gender, patients.contact, patients.address, patients.date_of_birth, patients.status_account, kecamatan.name as kecamatan_name, desa.name as desa_name 
                  FROM ' . $this->table . ' 
                  JOIN kecamatan ON patients.kecamatan_id = kecamatan.id 
                  JOIN desa ON patients.desa_id = desa.id 
                  WHERE patients.id = :id');
    $this->bind(':id', $id);
    return $this->single(); 
}
public function getPatientIdByUserId($userId)
    {
        $this->query('SELECT id FROM ' . $this->table . ' WHERE user_id = :user_id');
        $this->bind(':user_id', $userId);
        return $this->single()['id'];
    }



public function createPatient($patient, $userId)
{
    $this->query('INSERT INTO ' . $this->table . ' (user_id, kecamatan_id, desa_id, first_name, last_name, gender, contact, address, date_of_birth, status_account) VALUES (:user_id, :kecamatan_id, :desa_id, :first_name, :last_name, :gender, :contact, :address, :date_of_birth, :status_account)');
    
    $this->bind(':user_id', $userId);
    $this->bind(':kecamatan_id', $patient['kecamatan_id']);
    $this->bind(':desa_id', $patient['desa_id']);
    $this->bind(':first_name', $patient['first_name']);
    $this->bind(':last_name', $patient['last_name']);
    $this->bind(':gender', $patient['gender']);
    $this->bind(':contact', $patient['contact']);
    $this->bind(':address', $patient['address']);
    $this->bind(':date_of_birth', $patient['date_of_birth']);
    $this->bind(':status_account',true);

    $this->execute();
    
    return $this->rowCount();
}



public function updatePatient($id, $patient)
{
    $this->query('UPDATE ' . $this->table . ' SET user_id = :user_id, kecamatan_id = :kecamatan_id, desa_id = :desa_id, first_name = :first_name, last_name = :last_name, gender = :gender, contact = :contact, address = :address, date_of_birth = :date_of_birth, status_account = :status_account WHERE id = :id');
    
    $this->bind(':id', $id);
    $this->bind(':user_id', $patient['user_id']);
    $this->bind(':kecamatan_id', $patient['kecamatan_id']);
    $this->bind(':desa_id', $patient['desa_id']);
    $this->bind(':first_name', $patient['first_name']);
    $this->bind(':last_name', $patient['last_name']);
    $this->bind(':gender', $patient['gender']);
    $this->bind(':contact', $patient['contact']);
    $this->bind(':address', $patient['address']);
    $this->bind(':date_of_birth', $patient['date_of_birth']);
    $this->bind(':status_account', true);

    $this->execute();
    
    return $this->rowCount();
}


public function deletePatient($patient_id) {
    // Update status di tabel patient
    $this->query('UPDATE patients SET status_account = FALSE WHERE id = :id');
    $this->bind(':id', $patient_id);
    $this->execute();

    // Dapatkan user_id dari tabel patient berdasarkan patient_id
    $this->query('SELECT user_id FROM patients WHERE id = :id');
    $this->bind(':id', $patient_id);
    $user_id = $this->single();

    // Update status di tabel users
    $this->query('UPDATE users SET status_account = FALSE WHERE id = :id');
    $this->bind(':id', $user_id['user_id']);
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
