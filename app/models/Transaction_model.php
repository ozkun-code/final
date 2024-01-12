<?php

class TransactionModel extends Database
{
    private $tableRecipe = 'recipe';
    private $tableInvoice = 'invoice';

    public function saveToRecipe($drugId, $quantity, $price, $date)
    {
        $this->query('INSERT INTO ' . $this->tableRecipe . ' (drug_id, quantity, price, date) VALUES (:drugId, :quantity, :price, :date)');
        $this->bind(':drugId', $drugId);
        $this->bind(':quantity', $quantity);
        $this->bind(':price', $price);
        $this->bind(':date', $date);

        return $this->execute();
    }

    public function saveToInvoice($patientId, $date, $total)
    {
        $this->query('INSERT INTO ' . $this->tableInvoice . ' (patient_id, date, total) VALUES (:patientId, :date, :total)');
        $this->bind(':patientId', $patientId);
        $this->bind(':date', $date);
        $this->bind(':total', $total);

        return $this->execute();
    }

    // ... (other functions)
}
