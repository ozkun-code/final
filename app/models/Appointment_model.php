<?php
class AppointmentModel extends Database {
    private $table = 'appointments';

    public function getAllAppointments() {
        $this->query('SELECT * FROM ' . $this->table);
        return $this->resultSet();
    }

    public function getAppointmentById($id) {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        return $this->single();
    }

    public function createAppointment($data) {
        $this->query('INSERT INTO ' . $this->table . ' (patient_id, date, time, status) VALUES (:patient_id, :date, :time, :status)');
        $this->bind(':patient_id', $data['patient_id']);
        $this->bind(':date', $data['date']);
        $this->bind(':time', $data['time']);
        $this->bind(':status', $data['status']);
        $this->execute();
        return $this->rowCount();
    }

    public function updateAppointment($id, $data) {
        $this->query('UPDATE ' . $this->table . ' SET patient_id = :patient_id, date = :date, time = :time, status = :status WHERE id = :id');
        $this->bind(':id', $id);
        $this->bind(':patient_id', $data['patient_id']);
        $this->bind(':date', $data['date']);
        $this->bind(':time', $data['time']);
        $this->bind(':status', $data['status']);
        $this->execute();
        return $this->rowCount();
    }

    public function deleteAppointment($id) {
        $this->query('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $this->bind(':id', $id);
        $this->execute();
        return $this->rowCount();
    }

    public function getAppointmentsByDateAndTime($date, $time) {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE date = :date AND time = :time');
        $this->bind(':date', $date);
        $this->bind(':time', $time);
        $results = $this->resultSet();
        return $results;
    }
    public function getBookedSlotsByDate($date) {
        $this->query('SELECT * FROM ' . $this->table . ' WHERE date = :date');
        $this->bind(':date', $date);
        return $this->resultSet();
    }

    
}
?>
