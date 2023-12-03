<?php
class Login extends Controller {
    public function index()  
    {
        $this->view('login/index');
    }

    public function process()
    {
        session_start();
        // Atur session untuk kedaluwarsa setelah 30 menit
        $_SESSION['expiry'] = time() + (30 * 60);

        $model = new LoginModel();
        $user = $model->getUserByEmail($_POST['email']);

        if ($user && password_verify($_POST['password'], $user['password'])) {
            // Simpan data pengguna ke dalam session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            // Redirect semua pengguna ke dashboard/index
            header('Location: ' . BASEURL . '/dashboard/index');
        } else {
            header('Location: ' . BASEURL . '/login/index');
        }
    }
}
