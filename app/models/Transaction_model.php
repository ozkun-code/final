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
        $this->query('SELECT * FROM ' . $this->tableInvoice);
        return $this->resultSet();
    }
    // Di dalam TransactionModel

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
