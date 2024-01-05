<?php
class Appointments extends Controller {
    public function index()  
    {

        if (!isset($_SESSION['role'])) {
            header('Location: ' . BASEURL . '/login/index');
            exit();
        }
        $role = $_SESSION['role'];

        $this->view('layouts/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $this->view('Appointments/index');

        $this->view('layouts/footer');

    }

    public function create() {

        if (!isset($_SESSION['role'])) {
            header('Location: ' . BASEURL . '/login/index');
            exit();
        }
        $role = $_SESSION['role'];
    
        $this->view('layouts/head');
    
        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);
    
        $date = isset($_POST['selected_date']) ? $_POST['selected_date'] : null; // Set a default value if not set
    
        // Buat array timeslot (contoh, sesuaikan dengan struktur Anda)
        $timeslots = [
            '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30',
            '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30',
            '17:00', '17:30', '18:00', '18:30', '19:00', '19:30', '20:00'
        ];
    
        $availableSlots = [];
    
        foreach ($timeslots as $time) {
            // Cek apakah slot sudah dipesan (adapt this logic based on your actual booking mechanism)
            $isBooked = false; // Assuming no slots are booked initially
    
            // ... (your logic to check if a slot is booked)
    
            if (!$isBooked) {
                $availableSlots[] = $time;
            }
        }
        
        // Tampilkan halaman dengan status timeslot
   
        $data = [
            'date' => $date,
            'timeslots' => $availableSlots
        ];
        $patientModel = new PatientModel();
        $data['patients'] = $patientModel->getAllPatient();
        $this->view('appointments/create', $data);
        print_r($data);
        $this->view('layouts/footer');
    }
}    

    // Tambahkan fungsi lain yang diperlukan sesuai kebutuhan
    



