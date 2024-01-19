<?php 
class MedicalInformationModel extends Database
{
    private $table = 'medicalinformation';

    public function getMedicalInformationByPatientId($id)
{
    $this->query('SELECT * FROM ' . $this->table . ' WHERE patient_id = :patient_id');
    $this->bind(':patient_id', $id);
    $result = $this->single();

    // Jika tidak ada hasil, kembalikan array kosong
    if (!$result) {
        return [];
    }

    return $result;
}


public function createMedicalInformation($medicalInformation)
{
    $this->query('INSERT INTO ' . $this->table . ' (patient_id, height, weight, blood_group, pulse, blood_pressure, respiration, allergy, diet) VALUES (:patient_id, :height, :weight, :blood_group, :pulse, :blood_pressure, :respiration, :allergy, :diet)');

    // Bind the values
    $this->bind(':patient_id', $medicalInformation['patient_id']);
    $this->bind(':height', $medicalInformation['height']);
    $this->bind(':weight', $medicalInformation['weight']);
    $this->bind(':blood_group', $medicalInformation['blood_group']);
    $this->bind(':pulse', $medicalInformation['pulse']);
    $this->bind(':blood_pressure', $medicalInformation['blood_pressure']);
    $this->bind(':respiration', $medicalInformation['respiration']);
    $this->bind(':allergy', $medicalInformation['allergy']);
    $this->bind(':diet', $medicalInformation['diet']);

    // Execute the query
    $this->execute();

    return $this->rowCount();
}

public function updateMedicalInformation($id, $medicalInformation)
{
    $this->query('UPDATE ' . $this->table . ' SET height = :height, weight = :weight, blood_group = :blood_group, pulse = :pulse, blood_pressure = :blood_pressure, respiration = :respiration, allergy = :allergy, diet = :diet WHERE id = :id');

    // Bind the values
    $this->bind(':id', $id);
    $this->bind(':height', $medicalInformation['height']);
    $this->bind(':weight', $medicalInformation['weight']);
    $this->bind(':blood_group', $medicalInformation['blood_group']);
    $this->bind(':pulse', $medicalInformation['pulse']);
    $this->bind(':blood_pressure', $medicalInformation['blood_pressure']);
    $this->bind(':respiration', $medicalInformation['respiration']);
    $this->bind(':allergy', $medicalInformation['allergy']);
    $this->bind(':diet', $medicalInformation['diet']);

    // Execute the query
    $this->execute();

    return $this->rowCount();
}


    public function deleteMedicalInformation($id)
    {
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }
}



?>