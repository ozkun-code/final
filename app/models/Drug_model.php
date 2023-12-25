<?php
class DrugModel extends Database
{
    private $table = 'drug';

    public function getAllDrug()
    {
        $this->query('SELECT * FROM ' . $this->table);
        return $this->resultSet();
    }

    public function getDrugById($id)
    {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createDrug($data, $admin_id)
    {
        $this->query('INSERT INTO ' . $this->table . ' (admin_id, nama_obat, harga_beli, harga_jual, stok, expayer_date) VALUES (:admin_id, :nama_obat, :harga_beli, :harga_jual, :stok, :expayer_date)');
        $this->bind(':admin_id', $admin_id);
        $this->bind(':nama_obat', $data['nama_obat']);
        $this->bind(':harga_beli', $data['harga_beli']);
        $this->bind(':harga_jual', $data['harga_jual']);
        $this->bind(':stok', $data['stok']);
        $this->bind(':expayer_date', $data['expayer_date']);
        $this->execute();
        return $this->rowCount();
    }

    public function updateDrug($id, $data)
    {
        $this->query('UPDATE ' . $this->table . ' SET nama_obat = :nama_obat, harga_beli = :harga_beli, harga_jual = :harga_jual, stok = :stok, expayer_date = :expayer_date WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':nama_obat', $data['nama_obat']);
        $this->bind(':harga_beli', $data['harga_beli']);
        $this->bind(':harga_jual', $data['harga_jual']);
        $this->bind(':stok', $data['stok']);
        $this->bind(':expayer_date', $data['expayer_date']);
        $this->execute();
        return $this->rowCount();
    }

    public function deleteDrug($id)
    {
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }
    public function searchDrug($name)
    {
        $this->query('SELECT id, drug_name, manufacturer, dosage, price FROM drugs WHERE drug_name LIKE :name');
        $this->bind(':name', '%' . $name . '%');
        return $this->resultSet();
    }
}
