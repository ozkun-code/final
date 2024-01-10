<?php
class DiagnosisModel extends Database
{
    private $table = 'diagnoses';

    public function getAllDiagnoses()
    {
        $this->query('SELECT diagnoses.*, doctors.first_name, doctors.last_name FROM ' . $this->table . ' JOIN doctors ON diagnoses.doctor_id = doctors.id');
        return $this->resultSet();
    }


    public function getDiagnosisById($id)
    {
        $this->query('SELECT diagnoses.*, doctors.first_name, doctors.last_name FROM ' . $this->table . ' JOIN doctors ON diagnoses.doctor_id = doctors.id WHERE diagnoses.id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }


    public function createDiagnosis($data)
    {
        $this->query('INSERT INTO ' . $this->table . ' (patient_id, doctor_id, diagnosis, diagnosis_information, date) VALUES (:patient_id, :doctor_id, :diagnosis, :diagnosis_information, :date)');
        $this->bind(':patient_id', $data['patient_id']);
        $this->bind(':doctor_id', $data['doctor_id']);
        $this->bind(':diagnosis', $data['diagnosis']);
        $this->bind(':diagnosis_information', $data['diagnosis_information']); // new line
        $this->bind(':date', $data['date']);
        $this->execute();
        return $this->rowCount();
    }

    public function updateDiagnosis($id, $data)
    {
        $this->query('UPDATE ' . $this->table . ' SET patient_id = :patient_id, doctor_id = :doctor_id, diagnosis = :diagnosis, diagnosis_information = :diagnosis_information, date = :date WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':patient_id', $data['patient_id']);
        $this->bind(':doctor_id', $data['doctor_id']);
        $this->bind(':diagnosis', $data['diagnosis']);
        $this->bind(':diagnosis_information', $data['diagnosis_information']); // new line
        $this->bind(':date', $data['date']);
        $this->execute();
        return $this->rowCount();
    }

    public function getDiagnosesByPatientId($patientId)
    {
        $this->query('SELECT diagnoses.*, doctors.first_name, doctors.last_name FROM ' . $this->table . ' JOIN doctors ON diagnoses.doctor_id = doctors.id WHERE diagnoses.patient_id = :patient_id');
        $this->bind(':patient_id', $patientId);
        return $this->resultSet();
    }


    public function deleteDiagnosis($id)
    {
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }

    public function getDoctorNameById($doctorId)
    {
        $this->query('SELECT first_name, last_name FROM doctors WHERE id = :doctor_id');
        $this->bind(':doctor_id', $doctorId);
        return $this->single();
    }
}
