<?php
class Admin extends Controller
{
    public function index()
    {

        $role = $_SESSION['role'];

        $this->view('layouts/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $adminModel = new AdminModel();
        $data['admins'] = $adminModel->getAllAdmin();

        $this->view('admin/index', $data);

        $this->view('layouts/footer');
    }
    public function create()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $adminModel = new AdminModel();
        $data['admins'] = $adminModel->getAllAdmin();

        $this->view('admin/create', $data);

        $this->view('layouts/footer');
    }


    public function createactive()
    {

        $userModel = new LoginModel();
        $email = $_POST['email'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($userModel->isEmailExists($email)) {
            // Jika ya, berikan pesan error
            Flasher::setFlash('gagal', 'Email sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/admin/create');
            exit;
        }

        $userModel->createUser($_POST['email'], $hashed_password, 'admin');
        $userId = $userModel->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat

        $adminModel = new AdminModel();
        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'], // Set default value for specialty
        ];

        if ($adminModel->createAdmin($data, $userId) > 0) {
            Flasher::setFlash('berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/admin/create');
            exit;
        } else {
            Flasher::setFlash('gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/admin/create');
            exit;
        }
    }

    public function edit($id)
    {

        $role = $_SESSION['role'];
        $this->view('layouts/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);

        $this->view($navView);


        $adminModel = new AdminModel();
        $admin = $adminModel->getAdminById($id);

        $this->view('admin/edit', $admin);

        $this->view('layouts/footer');
    }

    public function updateAdmin($id)
    {
        // Create instance of Admin model
        $adminModel = new AdminModel();

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'], // Set default value for specialty
        ];

        if ($adminModel->updateAdmin($id, $data) > 0) {
            Flasher::setFlash('berhasil', 'di update', 'success');
            header('Location: ' . BASEURL . '/admin/edit/' . $id);
            exit;
        } else {
            Flasher::setFlash('gagal', 'di update', 'danger');
            header('Location: ' . BASEURL . '/admin/edit/' . $id);
            exit;
        }
    }
    public function delete($id)
    {
        $adminModel = new AdminModel();
        if ($adminModel->deleteAdmin($id) > 0) {
            Flasher::setFlash('berhasil', 'di hapus', 'success');
            header('Location: ' . BASEURL . '/admin');
            exit;
        } else {
            Flasher::setFlash('gagal', 'di hapus', 'danger');
            header('Location: ' . BASEURL . '/admin');
            exit;
        }
    }
}
