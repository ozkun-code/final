<?php
class Transaction extends Controller
{

    public function index($diagnosisId = null, $loopingCount = 1)
    {
        
        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        $adminData = $this->model('Admin_model')->getAdminByUserId($_SESSION['user_id']);
        $drugData = $this->model('Drug_model')->getAllDrugs();

    
        if ($diagnosisId !== null) {
            if (is_numeric($diagnosisId) && $diagnosisId > 0) {

                $diagnosisData = $this->model('Diagnosis_model')->getDiagnosisById($diagnosisId);

                if ($diagnosisData) {
                   
                    $patientData = $this->model('Patients_model')->getPatientById($diagnosisData['patient_id']);

                    $this->view('Transaction/index', [
                        'diagnosisData' => $diagnosisData,
                        'patientData' => $patientData,
                        'adminData' => $adminData,
                        'drugData' => $drugData,
                        'loopingCount' => $loopingCount,
                    ]);

                    $this->view('layouts/footer/footer');
                    return;
                }
            }
        }

        $this->view('Transaction/index', [
            'loopingCount' => $loopingCount,
        ]);

        $this->view('layouts/footer/footerts');
    }
    public function list()
    {


        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);


        $data['invoices'] = $this->model('Transaction_model')->getAllTransactions();
        var_dump($data['invoices']);
        
        
        $this->view('Transaction/list',$data);

        $this->view('layouts/footer/footer');



    }

    public function storeRecipe($patient_id, $looping,$diagnosis_id)
    {
    
    
       

        $date = date('Y-m-d'); 
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $items = [];
    
            $invoiceId = $this->model('Transaction_model')->saveToInvoice($patient_id, $date, 0,$diagnosis_id); 
   
            if ($invoiceId > 0) {
                for ($i = 0; $i < $looping; $i++) {
                    $selectDrug = $_POST['selectDrug' . $i];
                    $qty = $_POST['qty' . $i];

                    $hargaObat = $this->model('Drug_model')->getObatById($selectDrug);

                    $hargaObat = $hargaObat[0]['harga_jual'];
  
                    $totalItem = $hargaObat * $qty;

                    $items[] = $totalItem;
 
                    $this->model('Transaction_model')->saveToRecipe($invoiceId, $selectDrug, $patient_id, $qty, $hargaObat, $date);
                }
    

                $total = array_sum($items);

                $this->model('Transaction_model')->updateInvoiceTotal($invoiceId, $total);
                Flasher::setFlash('Invoice berhasil', 'ditambahkan', 'success');
            } else {

                Flasher::setFlash('Invoice gagal', 'ditambahkan', 'danger');
            }

            header('Location: ' . BASEURL . '/transaction/' . $diagnosis_id);
            exit;
        }
    }
    
   


    public function print()
    {

   
        $this->view('Transaction/print');
    }
    public function getDrugPriceById($drugId)
    {

        $drug = $this->model('Drug_model')->getObatById($drugId);

        // Ubah data obat ke dalam format JSON
        echo json_encode($drug);
    }
    public function getAllDrugs()
    {
      
        $drugs = $this->model('Drug_model')->getAllDrugsSD();

        // Ubah data obat ke dalam format JSON
        echo json_encode($drugs);
    }
}
