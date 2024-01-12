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
    public function storeRecipe($invoice_id)
    {
        $transactionModel = new Transaction();
        $looping = $_POST['loopingCount'];
        for ($i = 0; $i < $looping; $i++) {
            $drug_id = $_POST['drug_id'][$i];
            $quantity = $_POST['quantity'][$i];
            $price = $_POST['price'][$i];
            $date = date('Y-m-d H:i:s');

            $$transactionModel->saveToRecipe($drug_id, $quantity, $price, $date);
        }
        $patient_id = $_POST['patient_id'];
        $total = $_POST['total'];
        $date = date('Y-m-d H:i:s');

        header('Location: ' . BASEURL . '/transaction/print');
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
