<?php
class Login extends Controller
{
 
    public function index()
    {
        $this->view('login/index');
    }

    public function process()
{
    // Atur session untuk kedaluwarsa setelah 30 menit
    $_SESSION['expiry'] = time() + (30 * 60);

    $model = new LoginModel();
    $user = $model->getUserByEmail($_POST['email']);

    if ($user) {
        if (password_verify($_POST['password'], $user['password'])) {
            // Simpan data pengguna ke dalam session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirect semua pengguna ke dashboard/index
            header('Location: ' . BASEURL . '/dashboard');
        } else {
            // Password salah
            Flasher::setFlash('gagal login', 'password salah', 'danger');
            header('Location: ' . BASEURL . '/login');
        }
    } else {
        // Email belum terdaftar
        Flasher::setFlash('gagal login', 'email belum terdaftar', 'danger');
        header('Location: ' . BASEURL . '/login');
    }
}
public function delete($id)
    {
        $doctorModel = new DoctorModel();
        if ($doctorModel->deleteDoctor($id) > 0){
            Flasher::setFlash('berhasil', 'di hapus', 'success');
            header('Location: ' . BASEURL . '/doctors');
            exit;
        } else {
            Flasher::setFlash('gagal', 'di hapus', 'danger');
            header('Location: ' . BASEURL . '/doctors');
            exit;
        }
    }

    
}
