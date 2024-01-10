<?php
class Diagnoses extends Controller
{

        public function index($patientId = null)
        {
            // Jika tidak ada patientId, redirect ke halaman utama
            $patientId = $patientId ?: header('Location: ' . BASEURL . '/');
    
            $role = $_SESSION['role'];
    
            $this->view('layouts/head/head');
    
            $loginModel = new LoginModel();
            $navView = $loginModel->getNavView($role);
            $this->view($navView);
    
            $diagnosisModel = new DiagnosisModel();
            $doctorModel = new DoctorModel();
            $patientModel = new PatientModel();
            $diagnoses = $diagnosisModel->getDiagnosesByPatientId($patientId);
            $doctors = $doctorModel->getAllDoctor(); 
            $patient = $patientModel->getPatientById($patientId);

            
    
            $this->view('diagnoses/index', ['patient' => $patient, 'diagnoses' => $diagnoses, 'doctors' => $doctors]);
    
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
                Flasher::setFlash('Diagnosis berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('Diagnosis gagal', 'ditambahkan', 'danger');
            }
    
            // Redirect ke halaman diagnoses untuk pasien tertentu
            header('Location: ' . BASEURL . '/diagnoses/' . $data['patient_id']);
            exit;
        }


}
