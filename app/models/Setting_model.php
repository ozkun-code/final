<?php
class Settin_Model extends Database
{
    private $table = 'account'; // Change the table name to 'admin'

    public function getAllSetting()
    { // Change the method name to getAllAdmin
        $this->query('SELECT setting.first_name, setting.last_name, setting.contact FROM ' . $this->table . ' JOIN users ON admins.user_id = users.id');
        return $this->resultSet();
    }
}
