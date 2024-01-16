<?php
class Doctors extends Controller
{

    public function index($name = null)
    {

        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        // Cek apakah ada query pencarian
        if ($name) {
            $data['doctors'] = $this->model('Doctor_model')->searchDoctor($name);
        } else {
            $data['doctors'] = $this->model('Doctor_model')->getAllDoctor();
        }

        $this->view('doctors/index', $data);

        $this->view('layouts/footer/footer');
    }

    public function create()
    {
       

        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);
        $data['doctors'] = $this->model('Doctor_model')->getAllDoctor();

        $this->view('doctors/create', $data);

        $this->view('layouts/footer/footer');
    }

    public function createactive()
    {
        $email = $_POST['email'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($this->model('Login_model')->isEmailExists($email)) {
            // Jika ya, berikan pesan error
            Flasher::setFlash('gagal', 'Email sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/doctors/create');
            exit;
        }

        $this->model('Login_model')->createUser($_POST['email'], $hashed_password, 'doctor');
        $userId = $this->model('Login_model')->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'], // Set default value for specialty
        ];

        if ($this->model('Doctor_model')->createDoctor($data, $userId) > 0) {
            Flasher::setFlash('Doctor berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/doctors/create');
            exit;
        } else {
            Flasher::setFlash('Doctor gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/doctors/create');
            exit;
        }
    }

    public function edit($id)
    {
        
        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        $this->view($navView);

        $doctor = $this->model('Doctor_model')->getDoctorById($id);

        $this->view('doctors/edit', $doctor);

        $this->view('layouts/footer/footer');
    }

    public function updateDoctor($id)
    {
        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'], // Set default value for specialty
        ];

        if ($this->model('Doctor_model')->updateDoctor($id, $data) > 0) {
            Flasher::setFlash('Doctor berhasil', 'di update', 'success');
            header('Location: ' . BASEURL . '/doctors/edit/' . $id);
            exit;
        } else {
            Flasher::setFlash('Doctor gagal', 'di update', 'danger');
            header('Location: ' . BASEURL . '/doctors/edit/' . $id);
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Doctor_model')->deleteDoctor($id) > 0) {
            Flasher::setFlash('Doctor berhasil', 'di hapus', 'success');
            header('Location: ' . BASEURL . '/doctors');
            exit;
        } else {
            Flasher::setFlash('Doctor gagal', 'di hapus', 'danger');
            header('Location: ' . BASEURL . '/doctors');
            exit;
        }
    }
}
