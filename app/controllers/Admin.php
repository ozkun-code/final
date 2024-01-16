<?php
class Admin extends Controller
{

    public function index($name = null)
    {
        

        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        // Cek apakah ada query pencarian
        if ($name) {
            $data['admins'] = $this->model('Admin_model')->searchAdmin($name);
        } else {
            $data['admins'] = $this->model('Admin_model')->getAllAdmin();
        }

        $this->view('admin/index', $data);

        $this->view('layouts/footer/footer');
    }

    public function create()
    {
        

        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        $data['admins'] = $this->model('Admin_model')->getAllAdmin();

        $this->view('admin/create', $data);

        $this->view('layouts/footer/footer');
    }

    public function createactive()
    {
        $email = $_POST['email'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($this->model('Login_model')->isEmailExists($email)) {
            // Jika ya, berikan pesan error
            Flasher::setFlash('gagal', 'Email sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/admin/create');
            exit;
        }

        $this->model('Login_model')->createUser($_POST['email'], $hashed_password, 'admin');
        $userId = $this->model('Login_model')->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'], // Set default value for specialty
        ];

        if ($this->model('Admin_model')->createAdmin($data, $userId) > 0) {
            Flasher::setFlash('Admin berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/create');
            exit;
        } else {
            Flasher::setFlash('Admin gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/admin/create');
            exit;
        }
    }

    public function edit($id)
    {
        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);


        $admin = $this->model('Admin_model')->getAdminById($id);

        $this->view('admin/edit', $admin);

        $this->view('layouts/footer/footer');
    }

    public function updateAdmin($id)
    {
        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'],
        ];

        if ($this->model('Admin_model')->updateAdmin($id, $data) > 0) {
            Flasher::setFlash('Admin berhasil', 'di update', 'success');
            header('Location: ' . BASEURL . '/admin/edit/' . $id);
            exit;
        } else {
            Flasher::setFlash('Admin gagal', 'di update', 'danger');
            header('Location: ' . BASEURL . '/admin/edit/' . $id);
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Admin_model')->deleteAdmin($id) > 0) {
            Flasher::setFlash('Admin berhasil', 'di nonaktifkan', 'success');
            header('Location: ' . BASEURL . '/admin');
            exit;
        } else {
            Flasher::setFlash('Admin gagal', 'di nonaktifkan', 'danger');
            header('Location: ' . BASEURL . '/admin');
            exit;
        }
    }
}
