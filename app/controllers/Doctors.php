<?php 
class Doctors extends Controller
{
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

        // Dapatkan data dokter dari model
        $doctorModel = new Doctor_model();
        $data['doctors'] = $doctorModel->getAllDoctor();

        // Tampilkan konten
        $this->view('doctors/index', $data);

        // Tampilkan footer
        $this->view('layouts/footer');
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            $doctorModel = new Doctor_model();
            if ($doctorModel->createDoctor($data)) {
                redirect('doctors');
            } else {
                $this->view('doctors/create', ['error' => 'Gagal menambahkan dokter']);
            }
        } else {
            $this->view('doctors/create');
        }
    }

    public function edit($id)
    {
        $doctorModel = new Doctor_model();
        $data['doctor'] = $doctorModel->getDoctorById($id);
        if (!$data['doctor']) {
            $this->error404();
        } else {
            if (isset($_POST['submit'])) {
                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ];

                $doctorModel = new Doctor_model();
                if ($doctorModel->updateDoctor($id, $data)) {
                    redirect('doctors');
                } else {
                    $this->view('doctors/edit', ['error' => 'Gagal mengedit dokter']);
                }
            } else {
                $this->view('doctors/edit', $data);
            }
        }
    }

    public function delete($id)
{
    $doctorModel = new Doctor_model();
    $result = $doctorModel->deleteDoctor($id);
    
    if ($result) {
        header('Location: ' . BASEURL . '/doctors/index');
        exit();
    } else {
        $this->view('doctors/index', ['error' => 'Gagal menghapus dokter']);
    }
}


}