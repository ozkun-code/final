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
    
        $user = $this->model('Login_model')->getUserByEmail($_POST['email']);
    
        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                // Cek status akun
                if ($user['status_account'] == FALSE) {
                    // Akun tidak aktif
                    Flasher::setFlash('gagal login', 'akun tidak aktif', 'danger');
                    header('Location: ' . BASEURL . '/login');
                } else {
                    // Simpan data pengguna ke dalam session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['role'] = $user['role'];
    
                    // Redirect semua pengguna ke dashboard/index
                    header('Location: ' . BASEURL . '/dashboard');
                }
            } else {
                // Password salah
                Flasher::setFlash('gagal login', 'password salah', 'danger');
                header('Location: ' . BASEURL . '/login');
            }
        } else {
            // Email belum terdaftard
            Flasher::setFlash('gagal login', 'email belum terdaftar', 'danger');
            header('Location: ' . BASEURL . '/login');
        }
    }
    
public function delete($id)
    {
        
        if ($this->model('Doctor_model')->deleteDoctor($id) > 0){
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
