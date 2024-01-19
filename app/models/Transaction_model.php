<?php

class Transaction_model extends Database
{
    private $tableRecipe = 'recipe';
    private $tableInvoice = 'invoices';

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
    public function getAllTransactions()
    {
        $this->query('SELECT invoices.id, invoices.patient_id, invoices.diagnoses_id, invoices.date, invoices.total, patients.first_name, patients.last_name
        FROM invoices
        INNER JOIN patients ON invoices.patient_id = patients.id;');
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
    $this->query('SELECT * FROM ' . $this->tableRecipe . ' WHERE invoice_id = :invoice_id');
    $this->bind(':invoice_id', $invoiceId);
    return $this->resultSet();
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
