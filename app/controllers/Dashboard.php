<?php


class Dashboard extends Controller
{
    public function index()
    {
        // Jika pengguna saat ini adalah pasien, arahkan mereka ke halaman diagnosis mereka
        if ($_SESSION['role'] === 'patient') {
            $patient_id = $this->model('Patients_model')->getPatientIdByUserId($_SESSION['user_id']);
            header('Location: ' . BASEURL . '/diagnosis/' . $patient_id);
            exit();
        }
    
        // ... sisanya kode Anda ...
    
    
    
        $this->view('layouts/head/head');
        
        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        // Mengambil jumlah dari masing-masing model
        $data['patientCount'] = $this->model('Patients_model')->getCount();
        $data['doctorCount'] = $this->model('Doctor_model')->getCount();
        $data['adminCount'] = $this->model('Admin_model')->getCount();
        $data['drugCount'] = $this->model('Drug_model')->getCount();
        $data['serviceProfit'] = $this->model('Transaction_model')->getServiceProfit();
        $data['drugProfit'] = $this->model('Drug_model')->getDrugProfit();
        $data['invoices'] = $this->model('Transaction_model')->getAllTransactions();
        $data['invoiceCount'] = $this->model('Transaction_model')->getInvoiceCount();
        $data['diagnosisCount'] = $this->model('Diagnosis_model')->getDiagnosisCount();


        $data['role'] = $_SESSION['role'];
        var_dump($data['diagnosisCount'] );

        // Mengirim data ke tampilan
        $this->view('dashboard/index', $data);

        $this->view('layouts/footer/footer');
    }
}
