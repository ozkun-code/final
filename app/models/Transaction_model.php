<?php

class Transaction_model extends Database
{
    private $tableRecipe = 'recipe';
    private $tableInvoice = 'invoices';
    private $tablediagnosis = 'diagnoses';

    private $invoiceMultiplier = 50000; // Multiplier for service profit

    public function getServiceProfit()
    {
        $this->query('SELECT COUNT(*) as totalInvoices FROM ' . $this->tablediagnosis);
        $totalInvoices = $this->single()['totalInvoices'];

        return $totalInvoices * $this->invoiceMultiplier;
    }
    public function saveToRecipe($invoiceId, $drugId, $patientsId, $quantity, $price, $date)
    {
        $this->query('INSERT INTO ' . $this->tableRecipe . ' (invoice_id, drug_id, patients_id, quantity, price, date) VALUES (:invoiceId, :drugId, :patientsId, :quantity, :price, :date)');
        $this->bind(':invoiceId', $invoiceId);
        $this->bind(':drugId', $drugId);
        $this->bind(':patientsId', $patientsId);
        $this->bind(':quantity', $quantity);
        $this->bind(':price', $price);
        $this->bind(':date', $date);
    
        return $this->execute();
    }

    public function getInvoiceCount()
{
    $this->query('SELECT COUNT(*) as totalInvoices FROM ' . $this->tableInvoice);
    $totalInvoices = $this->single()['totalInvoices'];

    return $totalInvoices;
}

    public function getAllTransactions() {
        $query = "SELECT invoices.id, invoices.patient_id, invoices.diagnoses_id, invoices.date, invoices.total, patients.first_name, patients.last_name
                  FROM $this->tableInvoice
                  INNER JOIN patients ON invoices.patient_id = patients.id
                  ORDER BY invoices.id DESC";  

        $this->query($query);
        return $this->resultSet();
    }
    public function getTransactionsByPatientId($patient_id) {
        $query = "SELECT invoices.id, invoices.patient_id, invoices.diagnoses_id, invoices.date, invoices.total, patients.first_name, patients.last_name
                  FROM $this->tableInvoice
                  INNER JOIN patients ON invoices.patient_id = patients.id
                  WHERE patients.id = :patient_id
                  ORDER BY invoices.id DESC";  
    
        $this->query($query);
        $this->bind(':patient_id', $patient_id);
        return $this->resultSet();
    }
    
    public function getAllRecipes()
    {
        $this->query('SELECT * FROM ' . $this->tableRecipe);
        return $this->resultSet();
    }
    public function getInvoicesByDiagnosisId($diagnosisId)
{
    $this->query('SELECT * FROM ' . $this->tableInvoice . ' WHERE diagnoses_id = :diagnosis_id');
    $this->bind(':diagnosis_id', $diagnosisId);
    return $this->resultSet();
}

public function getRecipesByInvoiceId($invoiceId)
{
    $this->query('SELECT r.*, d.nama_obat, s.expired_date FROM ' . $this->tableRecipe . ' r LEFT JOIN drug d ON r.drug_id = d.id LEFT JOIN drug_stock s ON r.drug_id = s.drug_id WHERE r.invoice_id = :invoice_id');
    $this->bind(':invoice_id', $invoiceId);
    return $this->resultSet();
    
}
public function getInvoiceById($invoiceId)
{
    $this->query('SELECT invoices.*, patients.id as patient_id, patients.user_id, patients.kecamatan_id, patients.desa_id, patients.first_name, patients.last_name, patients.gender, patients.contact, patients.address, patients.date_of_birth, patients.status_account, kecamatan.name as kecamatan_name, desa.name as desa_name 
                  FROM ' . $this->tableInvoice . ' invoices
                  JOIN patients ON invoices.patient_id = patients.id 
                  JOIN kecamatan ON patients.kecamatan_id = kecamatan.id 
                  JOIN desa ON patients.desa_id = desa.id 
                  WHERE invoices.id = :invoice_id');
    $this->bind(':invoice_id', $invoiceId);
    return $this->single();
}



public function updateInvoiceTotal($invoiceId, $total)
{
    $this->query('UPDATE invoices SET total = :total WHERE id = :invoice_id');
    $this->bind(':total', $total);
    $this->bind(':invoice_id', $invoiceId);
    $this->execute();
    return $this->rowCount();
}


    public function saveToInvoice($patientId, $date, $total,$diagnosis_id)
{
    $this->query('INSERT INTO ' . $this->tableInvoice . ' (patient_id, date, total, diagnoses_id) VALUES (:patientId, :date, :total, :diagnosis_id)');
    $this->bind(':patientId', $patientId);
    $this->bind(':date', $date);
    $this->bind(':total', $total);
    $this->bind(':diagnosis_id', $diagnosis_id); // Tambahkan ini, dan pastikan $total adalah integer

    $this->execute();
    return $this->lastInsertId(); // Mengembalikan ID invoice yang baru dibuat
}



    // ... (other functions)
}
