<?php

class Drug_model extends Database
{
    private $tableDrug = 'drug';
    private $tableDrugStock = 'drug_stock';
    private $tableRecipes = 'recipe';
    private $recipeMargin = 2000;
    public function getStockByDrugId($drugId)
    {
        $this->query('SELECT * FROM ' . $this->tableDrugStock . ' WHERE drug_id = :drug_id');
        $this->bind(':drug_id', $drugId);
        return $this->single();
    }

    public function updateStockObat($drugId, $quantity)
{
    // Ambil stok obat yang akan dikurangi, diurutkan berdasarkan expired date
    $this->query('SELECT * FROM ' . $this->tableDrugStock . ' WHERE drug_id = :drug_id ORDER BY expired_date ASC');
    $this->bind(':drug_id', $drugId);
    $stockRows = $this->resultSet();

    // Lakukan iterasi pada stok yang ada untuk mengurangi quantity
    foreach ($stockRows as $stock) {
        $currentStock = $stock['quantity'];

        if ($quantity > 0) {
            // Hitung stok yang akan dikurangi
            $reduction = min($quantity, $currentStock);

            // Update stok obat
            $this->query('UPDATE ' . $this->tableDrugStock . ' SET quantity = :quantity WHERE drug_id = :drug_id AND expired_date = :expired_date');
            $this->bind(':quantity', $currentStock - $reduction);
            $this->bind(':drug_id', $drugId);
            $this->bind(':expired_date', $stock['expired_date']);
            $this->execute();

            // Kurangi quantity yang masih perlu dikurangi
            $quantity -= $reduction;
        } else {
            break; // Jika quantity sudah mencukupi, keluar dari loop
        }
    }
}

    
    public function getDrugProfit()
    {
        $this->query('SELECT COUNT(*) as totalRecipes FROM ' . $this->tableRecipes);
        $totalRecipes = $this->single()['totalRecipes'];

        return $totalRecipes * $this->recipeMargin;
    }

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
    public function getCount()
    {
        $this->query('SELECT COUNT(*) as drug_count FROM ' . $this->tableDrug);
        return $this->single()['drug_count'];
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
        $this->bind(':quantity', $data['quantity']); // Ubah dari 'stok' menjadi 'quantity'
        $this->bind(':expired_date', $data['expired_date']);
        $this->bind(':status', 1);
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
        // Set a default value for quantity if it is null
        $quantity = ($quantity !== null) ? $quantity : 0;

        // Assuming you have a table named 'drug_stock'
        $this->query('INSERT INTO drug_stock (drug_id, quantity, expired_date) VALUES (:drug_id, :quantity, :expired_date)');
        $this->bind(':drug_id', $drugId);
        $this->bind(':quantity', $quantity);
        $this->bind(':expired_date', $expiredDate);
        $this->execute();
        return $this->rowCount();
    }
}
