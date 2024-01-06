<?php
class Patients extends Controller
{

    public function index($name = null)
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $patientModel = new PatientModel();
        // Cek apakah ada query pencarian
        if ($name) {
            $data['patients'] = $patientModel->searchPatient($name);
        } else {
            $data['patients'] = $patientModel->getAllPatient();
        }

        $this->view('patients/index', $data);

        $this->view('layouts/footer/footer');
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

    public function delete($id)
    {
        $PatientModel = new PatientModel();
        if ($PatientModel->deletePatient($id) > 0) {
            Flasher::setFlash('Patient berhasil', 'di hapus', 'success');
            header('Location: ' . BASEURL . '/Patients/create');
            exit;
        } else {
            Flasher::setFlash('Patient gagal', 'di hapus', 'danger');
            header('Location: ' . BASEURL . '/Patients/create');
            exit;
        }
    }

    public function createactive()
    {

        $userModel = new LoginModel();
        $email = $_POST['email'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($userModel->isEmailExists($email)) {

            Flasher::setFlash('gagal', 'Email sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/Patients/create');
            exit;
        }

        $userModel->createUser($_POST['email'], $hashed_password, 'patient');
        $userId = $userModel->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat

        $PatientModel = new PatientModel();
        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'address' => $_POST['address'], // Set default value for specialty
            'date_of_birth' => $_POST['date_of_birth'], // Set default value for specialty
            'gender' => $_POST['gender'], // Set default value for specialty
        ];

        if ($PatientModel->createPatient($data, $userId) > 0) {
            Flasher::setFlash('Patient berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/Patients/create');
            exit;
        } else {
            Flasher::setFlash('Patient gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/Patients/create');
            exit;
        }
    }

    public function edit($id)
    {

        $role = $_SESSION['role'];
        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);

        $this->view($navView);


        $PatientModel = new PatientModel();
        $patient = $PatientModel->getPatientById($id);

        $this->view('Patients/edit', $patient);

        $this->view('layouts/footer/footer');
    }

    public function updatePatient($id)
    {
        $PatientModel = new PatientModel();

        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'],
        ];

        if ($PatientModel->updatePatient($id, $data) > 0) {
            Flasher::setFlash('Patient berhasil', 'di update', 'success');
            header('Location: ' . BASEURL . '/Patients/edit/' . $id);
            exit;
        } else {
            Flasher::setFlash('Patient gagal', 'di update', 'danger');
            header('Location: ' . BASEURL . '/Patients/edit/' . $id);
            exit;
        }
    }
}
