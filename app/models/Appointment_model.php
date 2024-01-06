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

    public function getBookedSlotsByDate($date) {
        $this->query('SELECT
                    time
                FROM
                    appointments
                WHERE
                    date = :date
                ORDER BY
                    time');
        $this->bind(':date', $date);
        return $this->resultSet();
    }

    public function getAvailableTimeslots($date) {
        // Buat array timeslot
        $timeslots = [
            '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
            '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30',
            '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00'
          ];

        // Perbarui array timeslots
        foreach ($this->getBookedSlotsByDate($date) as $bookedSlot) {
            $bookedTime = $bookedSlot['time']; // Asumsikan kolom 'time' berisi waktu dalam format "HH:mm"

            // Hapus timeslot yang sudah dijadwalkan dari array
            $key = array_search($bookedTime, $timeslots);
            if ($key !== false) {
                unset($timeslots[$key]);
            }
        }

        // Kembalikan array timeslots yang diperbarui
        return $timeslots;
    }
}
