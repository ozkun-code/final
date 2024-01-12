<?php

class DrugModel extends Database
{
    private $tableDrug = 'drug';
    private $tableDrugStock = 'drug_stock';

    public function getAllDrugs()
    {
        $this->query('SELECT drug.id, drug.nama_obat, drug.harga_jual, drug.harga_beli, MAX(drug_stock.status) as status, SUM(drug_stock.quantity) as total_stok FROM ' . $this->tableDrug . ' LEFT JOIN ' . $this->tableDrugStock . ' ON drug.id = drug_stock.drug_id GROUP BY drug.id');
        return $this->resultSet();
    }
    


    public function getDrugById($id)
    {
        $this->query('SELECT * FROM ' . $this->tableDrug . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createDrug($data, $admin_id)
    {
        $this->query('INSERT INTO ' . $this->tableDrug . ' (admin_id, nama_obat, harga_beli, harga_jual) VALUES (:admin_id, :nama_obat, :harga_beli, :harga_jual)');
        $this->bind(':admin_id', $admin_id);
        $this->bind(':nama_obat', $data['nama_obat']);
        $this->bind(':harga_beli', $data['harga_beli']);
        $this->bind(':harga_jual', $data['harga_jual']);
        $this->execute();

        $drugId = $this->lastInsertId();

        $this->query('INSERT INTO ' . $this->tableDrugStock . ' (drug_id, quantity, expired_date, status) VALUES (:drug_id, :quantity, :expired_date, :status)');
        $this->bind(':drug_id', $drugId);
        $this->bind(':quantity', $data['stok']);
        $this->bind(':expired_date', $data['expayer_date']);
        $this->bind(':status', 'active');
        $this->execute();

        return $this->rowCount();
    }

    public function updateDrug($id, $data)
    {
        $this->query('UPDATE ' . $this->tableDrug . ' SET nama_obat = :nama_obat, harga_beli = :harga_beli, harga_jual = :harga_jual WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':nama_obat', $data['nama_obat']);
        $this->bind(':harga_beli', $data['harga_beli']);
        $this->bind(':harga_jual', $data['harga_jual']);
        $this->execute();

        $this->query('UPDATE ' . $this->tableDrugStock . ' SET quantity = :quantity, expired_date = :expired_date WHERE drug_id = :drug_id');
        $this->bind(':quantity', $data['stok']);
        $this->bind(':expired_date', $data['expayer_date']);
        $this->bind(':drug_id', $id);
        $this->execute();

        return $this->rowCount();
    }

    public function deleteDrug($id)
    {
        $this->query('DELETE FROM ' . $this->tableDrug . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();

        $this->query('DELETE FROM ' . $this->tableDrugStock . ' WHERE drug_id = :drug_id');
        $this->bind(':drug_id', $id);
        $this->execute();

        return $this->rowCount();
    }

    public function searchDrug($name)
    {
        $this->query('SELECT * FROM ' . $this->tableDrug . ' WHERE nama_obat LIKE :name');
        $this->bind(':name', '%' . $name . '%');
        return $this->resultSet();
    }

    public function getObatById($id)
    {
        $this->query('SELECT harga_jual FROM ' . $this->tableDrug . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->resultSet();
    }

    public function getAllDrugsSD()
    {
        $this->query('SELECT id, nama_obat, harga_jual FROM ' . $this->tableDrug);
        return $this->resultSet();
    }
    public function addStock($drugId, $quantity, $expiredDate)
    {
        // Mengasumsikan Anda memiliki tabel bernama 'drug_stock'
        $this->query('INSERT INTO drug_stock (drug_id, quantity, expired_date) VALUES (:drug_id, :quantity, :expired_date)');
        $this->bind(':drug_id', $drugId);
        $this->bind(':quantity', $quantity);
        $this->bind(':expired_date', $expiredDate);
        $this->execute();
        return $this->rowCount();
    }

}
