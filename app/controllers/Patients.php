<?php
class Patients extends Controller
{

    public function index($name = null)
    {
       
     
        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        
        if ($name) {
            $data['patients'] = $this->model('Patients_model')->searchPatient($name);
        } else {
            $data['patients'] = $this->model('patients_model')->getAllPatient();
        }

        $this->view('patients/index', $data);

        $this->view('layouts/footer/footer');
    }



    public function create()
    {

        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);
        
        $data['kecamatan'] = $this->model('Patients_model')->getAllKecamatan();
        $defaultKecamatanId = isset($data['kecamatan'][0]['id']) ? $data['kecamatan'][0]['id'] : null;


        $data['desa'] = $defaultKecamatanId ? $this->model('Patients_model')->getDesaByKecamatanId($defaultKecamatanId) : [];

        $this->view('patients/create', $data);

        $this->view('layouts/footer/footer');
    }
    public function getVillagesBySubdistrictId($subdistrictId)
    {

        $villages = $this->model('Patients_model')->getVillagesBySubdistrictId($subdistrictId);

        echo json_encode($villages);
    }

    public function delete($id)
    {
       
        if ($this->model('Patients_model')->deletePatient($id) > 0) {
            Flasher::setFlash('Patient berhasil', 'di hapus', 'success');
            header('Location: ' . BASEURL . '/Patients');
            exit;
        } else {
            Flasher::setFlash('Patient gagal', 'di hapus', 'danger');
            header('Location: ' . BASEURL . '/Patients');
            exit;
        }
    }

    public function createactive()
    {

    
        $email = $_POST['email'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($this->model('Login_model')->isEmailExists($email)) {

            Flasher::setFlash('gagal', 'Email sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/Patients/create');
            exit;
        }

        $this->model('Login_model')->createUser($_POST['email'], $hashed_password, 'patient');
        $userId = $this->model('Login_model')->lastInsertId(); 

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

        if ($this->model('Patients_model')->createPatient($data, $userId) > 0) {
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

       
        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        $patient = $this->model('Patients_model')->getPatientById($id);

        $this->view('Patients/edit', $patient);

        $this->view('layouts/footer/footer');
    }

    public function updatePatient($id)
    {

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

        if ($this->model('Patients_model')->updatePatient($id, $data) > 0) {
            Flasher::setFlash('Patient berhasil', 'di update', 'success');
            header('Location: ' . BASEURL . '/Patients/edit/' . $id);
            exit;
        } else {
            Flasher::setFlash('Patient gagal', 'di update', 'danger');
            header('Location: ' . BASEURL . '/Patients/edit/' . $id);
            exit;
        }
    }
    public function detail($id)
    {

        
        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);
        $patient = $this->model('Patients_model')->getPatientById($id);
        $medical = $this->model('MedicalInformationModel')->getMedicalInformationByPatientId($id);

        $this->view('patients/detail', ['patient' => $patient, 'medical' => $medical]);
        $this->view('layouts/footer/footer');
    }
}
