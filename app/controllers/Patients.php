<?php
class Patients extends Controller
{
    public function index()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $patientModel = new PatientModel();
        $data['patients'] = $patientModel->getAllPatient();

        $this->view('patients/index', $data);

        $this->view('layouts/footer');
    }



    public function create()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $PatientModel = new PatientModel();
        $data['Patients'] = $PatientModel->getAllpatient();

        $this->view('Patients/create', $data);

        $this->view('layouts/footer');
    }

    public function delete()
    {
        $PatientModel = new PatientModel();
        if ($PatientModel->deletePatient($data, $userId) > 0) {
            Flasher::setFlash('berhasil', 'di hapus', 'success');
            header('Location: ' . BASEURL . '/Patients/create');
            exit;
        } else {
            Flasher::setFlash('gagal', 'di hapus', 'danger');
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
            Flasher::setFlash('berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/Patients/create');
            exit;
        } else {
            Flasher::setFlash('gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/Patients/create');
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


        $PatientModel = new PatientModel();
        $patient = $PatientModel->getPatientById($id);

        $this->view('Patients/edit', $patient);

        $this->view('layouts/footer');
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
            Flasher::setFlash('berhasil', 'di update', 'success');
            header('Location: ' . BASEURL . '/Patients/edit/' . $id);
            exit;
        } else {
            Flasher::setFlash('gagal', 'di update', 'danger');
            header('Location: ' . BASEURL . '/Patients/edit/' . $id);
            exit;
        }
    }
}
