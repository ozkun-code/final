<?php
class Diagnosis extends Controller
{

        public function index($patientId = null)
        {
    
            $this->view('layouts/head/head');
    
            $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
            $this->view($navView);
            $userRole = $_SESSION['role'];
           

            $diagnosis = $this->model('Diagnosis_model')->getDiagnosesByPatientId($patientId);
            $doctors = $this->model('Doctor_model')->getAllDoctor(); 
            $patient = $this->model('Patients_model')->getPatientById($patientId);
    
            $this->view('diagnosis/index', ['patient' => $patient, 'diagnosis' => $diagnosis, 'doctors' => $doctors, 'userRole' => $userRole]);
    
            $this->view('layouts/footer/footer');
        }
    
    
        public function createactive()
        {
            
            $data = [
                'patient_id' => $_POST['patient_id'],
                'doctor_id' => $_POST['doctor_id'],
                'diagnosis' => $_POST['diagnosis'],
                'diagnosis_information' => $_POST['diagnosis_information'],
                'date' => $_POST['date'],
            ];
    
            if ($this->model('Diagnosis_model')->createDiagnosis($data) > 0) {
                Flasher::setFlash('Diagnosis berhasil', 'ditambahkan', 'success');
            } else {
                Flasher::setFlash('Diagnosis gagal', 'ditambahkan', 'danger');
            }
    
            // Redirect ke halaman diagnoses untuk pasien tertentu
            header('Location: ' . BASEURL . '/diagnosis/' . $data['patient_id']);
            exit;
        }


}
