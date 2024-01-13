<?php
class Transaction extends Controller
{

    public function index($diagnosisId = null, $loopingCount = 1)
    {
        // Cek sesi role
        $diagnosisId = $diagnosisId ?: header('Location: ' . BASEURL . '/list');

        if (!isset($_SESSION['role'])) {
            header('Location: ' . BASEURL . '/login/index');
            exit();
        }

        $role = $_SESSION['role'];
        $user_id = $_SESSION['user_id'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $adminModel = new AdminModel();
        $drugModel  = new DrugModel();

        $navView = $loginModel->getNavView($role);
        $adminData = $adminModel->getAdminByUserId($user_id);
        $drugData = $drugModel->getAllDrugs();

        $this->view($navView);

        // Jika terdapat parameter ID diagnosa, ambil dan tampilkan informasi diagnosa dan pasien
        if ($diagnosisId !== null) {
            if (is_numeric($diagnosisId) && $diagnosisId > 0) {
                $diagnosisModel = new DiagnosisModel();
                $diagnosisData = $diagnosisModel->getDiagnosisById($diagnosisId);

                if ($diagnosisData) {
                    $patientModel = new PatientModel();
                    $patientData = $patientModel->getPatientById($diagnosisData['patient_id']);

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

        // Tampilkan konten biasa jika tidak ada parameter ID diagnosa atau data tidak ditemukan
        $this->view('Transaction/index', [
            'loopingCount' => $loopingCount,
        ]);

        $this->view('layouts/footer/footerts');
    }
    public function list()
    {


        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);
        $transactionModel = new TransactionModel();
        $data['invoice'] = $transactionModel->getAllTransactions();
        
        // Tampilkan konten
        $this->view('Transaction/list',$data);

        $this->view('layouts/footer/footer');



    }











    public function storeRecipe($patient_id, $looping)
    {
        // Create an instance of the TransactionModel
        $transactionModel = new TransactionModel();
    
        // Create an instance of the DrugModel
        $drugModel = new DrugModel();
    
        // Get the current date
        $date = date('Y-m-d'); 
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Array to store total for each item
            $items = [];
    
            // Create an invoice
            $invoiceId = $transactionModel->saveToInvoice($patient_id, $date, 0); // Pass 0 for the initial total
    
            // Check if the invoice was created successfully
            if ($invoiceId > 0) {
                // Loop through the items
                for ($i = 0; $i < $looping; $i++) {
                    $selectDrug = $_POST['selectDrug' . $i];
                    $qty = $_POST['qty' . $i];
    
                    // Get drug price by id
                    $hargaObat = $drugModel->getObatById($selectDrug);
    
                    // Assuming $hargaObat is an array, get the first element (assuming it's the price)
                    $hargaObat = $hargaObat[0]['harga_jual'];
    
                    // Calculate total for this item
                    $totalItem = $hargaObat * $qty;
    
                    // Add the total to the array
                    $items[] = $totalItem;
    
                    // Save details to the recipe
                    $transactionModel->saveToRecipe($invoiceId, $selectDrug, $patient_id, $qty, $hargaObat, $date);
                }
    
                // Calculate the overall total
                $total = array_sum($items);
    
                // Update the total in the invoice
                $transactionModel->updateInvoiceTotal($invoiceId, $total);
                Flasher::setFlash('Invoice berhasil', 'ditambahkan', 'success');
            } else {
                // Set Flash message for failure
                Flasher::setFlash('Invoice gagal', 'ditambahkan', 'danger');
            }
    
            // Redirect to the desired page
            header('Location: ' . BASEURL . '/transaction/list');
            exit;
        }
    }
    
    
    



    



    public function print()
    {

        // Tampilkan konten
        $this->view('Transaction/print');
    }
    public function getDrugPriceById($drugId)
    {
        $drugModel = new DrugModel();
        $drug = $drugModel->getObatById($drugId);

        // Ubah data obat ke dalam format JSON
        echo json_encode($drug);
    }
    public function getAllDrugs()
    {
        $drugModel = new DrugModel();
        $drugs = $drugModel->getAllDrugsSD();

        // Ubah data obat ke dalam format JSON
        echo json_encode($drugs);
    }
}
