<?php
class Diagnoses extends Controller
{
    public function index($patientId = null)
    {
        if (!$patientId) {
            header('Location: ' . BASEURL . '/');
            exit;
        }

        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $diagnosisModel = new DiagnosisModel();

        if ($patientId) {
            $diagnoses = $diagnosisModel->getDiagnosesByPatientId($patientId);
        } else {
            $diagnoses = $diagnosisModel->getAllDiagnoses();
        }

        $this->view('diagnoses/index', ['diagnoses' => $diagnoses]);

        $this->view('layouts/footer/footer');
    }


    public function create()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $diagnosisModel = new DiagnosisModel();
        $data['diagnoses'] = $diagnosisModel->getAllDiagnoses();

        $this->view('diagnoses/create', $data);

        $this->view('layouts/footer/footer');
    }

    public function createactive()
    {
        $diagnosisModel = new DiagnosisModel();
        $data = [
            'patient_id' => $_POST['patient_id'],
            'doctor_id' => $_POST['doctor_id'],
            'diagnosis' => $_POST['diagnosis'],
            'diagnosis_information' => $_POST['diagnosis_information'],
            'date' => $_POST['date'],
        ];

        if ($diagnosisModel->createDiagnosis($data) > 0) {
            Flasher::setFlash('Diagnosis berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/diagnoses/create');
            exit;
        } else {
            Flasher::setFlash('Diagnosis gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/diagnoses/create');
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

        $diagnosisModel = new DiagnosisModel();
        $diagnosis = $diagnosisModel->getDiagnosisById($id);

        $this->view('diagnoses/edit', $diagnosis);

        $this->view('layouts/footer/footer');
    }

    public function showDoctorName($doctorId)
    {
        $diagnosisModel = new DiagnosisModel();
        $doctorName = $diagnosisModel->getDoctorNameById($doctorId);

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($_SESSION['role']);
        $this->view($navView);

        $this->view('diagnoses/doctor_name', ['doctorName' => $doctorName]);

        $this->view('layouts/footer/footer');
    }
}
