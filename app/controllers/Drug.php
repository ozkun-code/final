<?php
class Drug extends Controller
{
    public function index()
    {
       
        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        $data['drugs'] = $this->model('Drug_model')->getAllDrugs();
        $this->view('drug/index', $data);

        $this->view('layouts/footer/footer');
    }
    public function New()
    {
       

        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

        $data['drugs'] = $this->model('Doctor_model')->getAllDrugs();
        $this->view('drug/new', $data);

        $this->view('layouts/footer/footer');
    }

    public function createNewDrugAction()
    {
        $user_id = $_SESSION['user_id'];
        

        $userId = $this->model('Login_model')->lastInsertId();
        $adminId = $this->model('Admin_model')->getAdminByUserId($user_id);
        $adminId = $adminId['id'];
   
        $data = [
            'nama_obat' => $_POST['nama_obat'],
            'harga_jual' => $_POST['harga_jual'],
            'harga_beli' => $_POST['harga_beli'],
            'quantity' => $_POST['quantity'],
            'expired_date' => $_POST['expired_date'],
        ];
    
        if ($this->model('Drug_model')->createDrug($data, $adminId) > 0) {
            Flasher::setFlash('Drug berhasil', 'di tambahkan', 'success');
        }
    
        header('Location: ' . BASEURL . '/drug/new');
        exit;
    }
    


    public function Stock()
    {
        

        $this->view('layouts/head/head');

        $navView = $this->model('Login_model')->getNavView($_SESSION['role']);
        $this->view($navView);

       
        $data['drugs'] = $this->model('Drug_model')->getAllDrugs();

        $this->view('drug/stock', $data); // Assuming you have a separate view for adding stock

        $this->view('layouts/footer/footer');
    }
   

    public function addStockAction()
    {
        $user_id = $_SESSION['user_id'];


        $userId = $this->model('Login_model')->lastInsertId(); 
        $adminId = $this->model('Admin_model')->getAdminByUserId($user_id);
        
        $data = [
            'drug_id' => $_POST['drug_id'],
            'quantity' => $_POST['quantity'],
            'expired_date' => $_POST['expired_date'],
        ];

        if ($this->model('Drug_model')->addStock($data['drug_id'], $data['quantity'], $data['expired_date']) > 0) {
            Flasher::setFlash('Stok berhasil ditambahkan', '', 'success');
        }

        header('Location: ' . BASEURL . '/drug/Stock');
        exit;
    }
}
