<?php
class Dashboard extends Controller {
    public function index()  
    {
        // Mulai session
        session_start();

        // Cek apakah session 'role' sudah ada
        if (!isset($_SESSION['role'])) {
            // Jika belum ada, arahkan pengguna ke halaman login
            header('Location: ' . BASEURL . '/login/index');
            exit();
        }

        // Dapatkan role dari session
        $role = $_SESSION['role'];

        // Tampilkan header
        $this->view('layouts/head');

        // Tampilkan navigasi yang sesuai dengan role pengguna
        switch ($role) {
            case 'super_admin':
                $this->view('layouts/navSuperadmin');
                break;
            case 'admin':
                $this->view('layouts/navAdmin');
                break;
            case 'Doctor':
                $this->view('layouts/navDoctor');
                break;
            default:
                $this->view('layouts/navPatient');
                break;
        }

        // Tampilkan konten
        $this->view('Dashboard/index');

        // Tampilkan footer
        $this->view('layouts/footer');
    }
}
