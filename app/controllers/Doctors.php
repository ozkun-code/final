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

    // Buat instance dari model Login
    $loginModel = new LoginModel();

    // Dapatkan view navigasi dari model Login
    $navView = $loginModel->getNavView($role);

    // Tampilkan navigasi yang sesuai dengan role pengguna
    $this->view($navView);

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

    // Buat instance dari model Login
    $loginModel = new LoginModel();

    // Dapatkan view navigasi dari model Login
    $navView = $loginModel->getNavView($role);

    // Tampilkan navigasi yang sesuai dengan role pengguna
    $this->view($navView);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Proses data form
        $userModel = new UserModel();
        $doctorModel = new Doctor_Model();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $userModel->createUser($_POST['email'], $hashed_password, 'doctor');
        $userId = $userModel->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat
        $data = [
            'name' => $_POST['name'],
            'contact' => $_POST['contact'],
            'specialty' => 'doctor', // Set default value for specialty
        ];

        if ($doctorModel->createDoctor($data, $userId)) { // Kirim $userId ke fungsi createDoctor()
            // Jika berhasil, arahkan ke halaman index
            header('Location: ' . BASEURL . '/doctors/index');
            exit();
        } else {
            // Jika gagal, tampilkan pesan error
            $this->view('doctors/create', ['error' => 'Gagal menambahkan dokter']);
        }
    } else {
        // Tampilkan form
        $this->view('doctors/create');
    }

    // Tampilkan footer
    $this->view('layouts/footer');
}




public function edit($id)
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

    // Buat instance dari model Login
    $loginModel = new LoginModel();

    // Dapatkan view navigasi dari model Login
    $navView = $loginModel->getNavView($role);

    // Tampilkan navigasi yang sesuai dengan role pengguna
    $this->view($navView);

    // Buat instance dari model Doctor
    $doctorModel = new DoctorModel();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Proses data form
        $data = [
            'name' => $_POST['name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'],
        ];

        if ($doctorModel->updateDoctor($id, $data)) {
            // Jika berhasil, arahkan ke halaman index
            header('Location: ' . BASEURL . '/doctors/index');
            exit();
        } else {
            // Jika gagal, tampilkan pesan error
            $this->view('doctors/edit', ['error' => 'Gagal mengupdate dokter']);
        }
    } else {
        // Dapatkan data dokter
        $doctor = $doctorModel->getDoctorById($id);

        // Tampilkan form dengan data awal
        $this->view('doctors/edit', $doctor);
    }

    // Tampilkan footer
    $this->view('layouts/footer');
}


    public function delete($id)
{
    $doctorModel = new Doctor_model();
    $result = $doctorModel->deleteDoctor($id);
    
    if ($result) {
        header('Location: ' . BASEURL . '/doctors/');
        exit();
    } else {
        $this->view('doctors/index', ['error' => 'Gagal menghapus dokter']);
    }
}


}