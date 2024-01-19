<?php
class Setting extends Controller
{
    public function index()
    {
        // Ambil ID dan role pengguna dari sesi
        $userId = $_SESSION['user_id'];
        $userRole = $_SESSION['role'];

        $this->view('layouts/head/head');

        // Menggunakan model Login_model untuk mendapatkan tampilan navigasi
        $navView = $this->model('Login_model')->getNavView($userRole);
        $this->view($navView);

        // Membuat objek UserModel
        $userModel = $this->model('Login_model');

        // Ambil pengaturan berdasarkan role pengguna
        switch ($userRole) {
            case 'patient':
                $data['settings'] = $this->model('Patients_model')->settingPatientByUserId($userId);
                break;
            case 'admin':
                $data['settings'] = $this->model('Admin_model')->getAdminByUserId($userId);
                break;
            case 'doctor':
                $data['settings'] = $this->model('Doctor_model')->getDoctorById($userId);
                break;
            case 'superadmin':
                // Tambahkan logika untuk superadmin jika diperlukan
                break;
            default:
                // Redirect atau tindakan lain jika role tidak valid
                header("Location: /error");
                exit;
        }

        // Ambil data pengguna
        $data['user'] = $userModel->getUserById($userId);

        // Tampilkan view untuk setting
        $this->view('setting/index', $data);

        $this->view('layouts/footer/footer');
    }
    public function updateAccount()
{
    // Ambil ID dan role pengguna dari sesi
    $userId = $_SESSION['user_id'];
    $userRole = $_SESSION['role'];

    // Ambil data dari form
    $email = $_POST['email'];
    $rawPassword = $_POST['password']; // Password yang belum di-hash
    $hashedPassword = password_hash($rawPassword, PASSWORD_DEFAULT); // Password yang sudah di-hash
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $contact = $_POST['contact'];

    // Lakukan validasi data jika diperlukan

    // Update data pada tabel users
    $updateUserSuccess = $this->model('Login_model')->updateUser($userId, $email, $hashedPassword); // Simpan hash password ke database

    // Update data pada tabel sesuai role
    switch ($userRole) {
        case 'patient':
            $updateRoleSuccess = $this->model('Patients_model')->settingUpdatePatient($userId, $firstName, $lastName, $contact);
            break;
        case 'admin':
            $updateRoleSuccess = $this->model('Admin_model')->settingUpdateAdmin($userId, $firstName, $lastName, $contact);
            break;
        case 'doctor':
            $updateRoleSuccess = $this->model('Doctor_model')->settingUpdateDoctor($userId, $firstName, $lastName, $contact);
            break;
        // Tambahkan case sesuai role lain jika diperlukan
    }

    if ($updateUserSuccess && $updateRoleSuccess) {
        // Jika update pada user dan role berhasil, tampilkan pesan sukses menggunakan Flasher
        Flasher::setFlash('Update berhasil', 'Data akun berhasil diperbarui', 'success');
    } else {
        // Jika ada yang gagal, tampilkan pesan gagal menggunakan Flasher
        Flasher::setFlash('Gagal', 'Update data akun', 'danger');
    }

    // Redirect atau tampilkan pesan berhasil
    header("Location: /setting");
    exit;
}



}

?>
