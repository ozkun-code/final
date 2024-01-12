<?php
class Drug extends Controller
{
    public function index()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $drugModel = new DrugModel();
        $data['drugs'] = $drugModel->getAllDrugs();

        $this->view('drug/index', $data);

        $this->view('layouts/footer/footer');
    }
    public function New()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $drugModel = new DrugModel();
        $data['drugs'] = $drugModel->getAllDrugs();

        $this->view('drug/new', $data); // Assuming you have a separate view for creating new drugs

        $this->view('layouts/footer/footer');
    }

    public function createNewDrugAction()
    {
        $user_id = $_SESSION['user_id'];
        $userModel = new LoginModel();
        $adminModel = new AdminModel();
        $userId = $userModel->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat
        $adminId = $adminModel->getAdminByUserId($user_id);
        $drugModel = new DrugModel();
        $data = [
            'nama_obat' => $_POST['nama_obat'],
            'harga_jual' => $_POST['harga_jual'],
            'harga_beli' => $_POST['harga_beli'],
            'stok' => isset($_POST['stok']) ? $_POST['stok'] : null,
            'expired_date' => $_POST['expired_date'],
        ];

        if ($drugModel->createDrug($data, $adminId) > 0) {
            Flasher::setFlash('Drug berhasil', 'di tambahkan', 'success');
        }

        header('Location: ' . BASEURL . '/drug');
        exit;
    }


    public function Stock()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $drugModel = new DrugModel();
        $data['drugs'] = $drugModel->getAllDrugs();

        $this->view('drug/stock', $data); // Assuming you have a separate view for adding stock

        $this->view('layouts/footer/footer');
    }

    public function addStockAction()
    {
        $user_id = $_SESSION['user_id'];
        $userModel = new LoginModel();
        $adminModel = new AdminModel();
        $userId = $userModel->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat
        $adminId = $adminModel->getAdminByUserId($user_id);
        $drugModel = new DrugModel();
        $data = [
            'drug_id' => $_POST['drug_id'],
            'quantity' => $_POST['quantity'],
            'expired_date' => $_POST['expired_date'],
        ];

        if ($drugModel->addStock($data['drug_id'], $data['quantity'], $data['expired_date']) > 0) {
            Flasher::setFlash('Stok berhasil ditambahkan', '', 'success');
        }

        header('Location: ' . BASEURL . '/drug/addStock');
        exit;
    }
}
