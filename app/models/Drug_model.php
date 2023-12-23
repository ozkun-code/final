<?php
class DrugModel extends Database
{
    private $table = 'drug'; // Change the table name to 'drug'

    public function getAllDrug()
    { // Change the method name to getAllDrugs
        $this->query('SELECT drug.id, drug.nama_obat,drug.expayer_date, drug.harga_beli, drug.admin_id, drug.harga_jual, drug.stok, admins.first_name, admins.last_name FROM ' . $this->table . ' JOIN admins ON drug.admin_id = admins.id');
        return $this->resultSet();
    }


    public function getDrugById($id)
    { // Change the method name to getDrugById
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createDrug($data, $adminId)
    { // Change the method name to createDrug
        $this->query('INSERT INTO ' . $this->table . ' (admin_id, nama_obat, harga_beli, harga_jual, stok) VALUES (:admin_id, :nama_obat, :harga_beli, :harga_jual, :stok)');
        $this->bind(':admin_id', $adminId);
        $this->bind(':nama_obat', $data['nama_obat']);
        $this->bind(':harga_beli', $data['harga_beli']);
        $this->bind(':harga_jual', $data['harga_jual']);
        $this->bind(':stok', $data['stok']);
        $this->execute();
        return $this->rowCount();
    }

    public function updateDrug($id, $data)
    { // Change the method name to updateDrug
        $this->query('UPDATE ' . $this->table . ' SET nama_obat = :nama_obat, harga_beli = :harga_beli, harga_jual = :harga_jual, stok = :stok WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':nama_obat', $data['nama_obat']);
        $this->bind(':harga_beli', $data['harga_beli']);
        $this->bind(':harga_jual', $data['harga_jual']);
        $this->bind(':stok', $data['stok']);
        $this->execute();
        return $this->rowCount();
    }

    public function deleteDrug($id)
    { // Change the method name to deleteDrug
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }
}
