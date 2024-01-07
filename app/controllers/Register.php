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

    public function process()
    {
        $model = new UserModel();
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $model->createUser($_POST['email'], $hashed_password, 'super_admin');

        header('Location: ' . BASEURL . '/login/index');
    }
    public function create()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $patientModel = new PatientModel();
        $data['kecamatan'] = $patientModel->getAllKecamatan();

        // Mendapatkan id kecamatan pertama sebagai default
        $defaultKecamatanId = isset($data['kecamatan'][0]['id']) ? $data['kecamatan'][0]['id'] : null;

        // Mendapatkan desa berdasarkan kecamatan_id
        $data['desa'] = $defaultKecamatanId ? $patientModel->getDesaByKecamatanId($defaultKecamatanId) : [];

        $this->view('patients/create', $data);

        $this->view('layouts/footer/footer');
    }
    public function getVillagesBySubdistrictId($subdistrictId)
    {
        $patientModel = new PatientModel();
        $villages = $patientModel->getVillagesBySubdistrictId($subdistrictId);

        // Ubah data desa ke dalam format JSON
        echo json_encode($villages);
    }
}
