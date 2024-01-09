<?php

class Register extends Controller
{
    protected $data = array();

    public function __construct()
    {
        // Menetapkan nilai di dalam konstruktor
        $this->data['nama_controller'] = 'register';
    }
    public function index()
    {
        $patientModel = new PatientModel();
        $data['kecamatan'] = $patientModel->getAllKecamatan();

        // Mendapatkan id kecamatan pertama sebagai default
        $defaultKecamatanId = isset($data['kecamatan'][0]['id']) ? $data['kecamatan'][0]['id'] : null;

        // Mendapatkan desa berdasarkan kecamatan_id
        $data['desa'] = $defaultKecamatanId ? $patientModel->getDesaByKecamatanId($defaultKecamatanId) : [];

        $this->view('register/index', $data);
    }

    public function createactive()
    {

        $userModel = new LoginModel();
        $email = $_POST['email'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($userModel->isEmailExists($email)) {

            Flasher::setFlash('gagal', 'Email sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/register');
            exit;
        }

        $userModel->createUser($_POST['email'], $hashed_password, 'patient');
        $userId = $userModel->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat

        $PatientModel = new PatientModel();
        $data = [
            'kecamatan_id' => $_POST['kecamatan_id'],
            'desa_id' => $_POST['desa_id'],
            'status_account' => $_POST['status_account'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'address' => $_POST['address'],
            'date_of_birth' => $_POST['date_of_birth'],
            'gender' => $_POST['gender'],
        ];

        if ($PatientModel->createPatient($data, $userId) > 0) {
            Flasher::setFlash('Patient berhasil', 'di tambahkan silahkan login', 'success');
            header('Location: ' . BASEURL . '/register');
            exit;
        } else {
            Flasher::setFlash('Patient gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/register');
            exit;
        }
    }

    public function process()
    {
        $model = new UserModel();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model->createUser($_POST['email'], $hashed_password, 'super_admin');

        header('Location: ' . BASEURL . '/login/index');
    }
   
    public function getVillagesBySubdistrictId($subdistrictId)
    {
        $patientModel = new PatientModel();
        $villages = $patientModel->getVillagesBySubdistrictId($subdistrictId);

        // Ubah data desa ke dalam format JSON
        echo json_encode($villages);
    }
}
