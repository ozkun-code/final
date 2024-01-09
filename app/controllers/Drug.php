<?php
class Drug extends Controller
{
    public function index($name = null)
    {

        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $drugModel = new DrugModel();
        $data['drugs'] = $drugModel->getAllDrug();
   
        $this->view('drug/index', $data);

        $this->view('layouts/footer/footer');
    }
    public function create()
    {
        $role = $_SESSION['role'];

        $this->view('layouts/head/head');

        $loginModel = new LoginModel();
        $navView = $loginModel->getNavView($role);
        $this->view($navView);

        $drugModel = new DrugModel();
        $data['drugs'] = $drugModel->getAllDrug();

        $this->view('drug/create', $data);

        $this->view('layouts/footer/footer');
    }


    public function createactive()
    {

        $userModel = new LoginModel();
        $userId = $userModel->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat
        $adminId = $_SESSION['admin_id'];


        $drugModel = new DrugModel();
        $data = [
            'nama_obat' => $_POST['nama_obat'],
            'harga_jual' => $_POST['harga_jual'],
            'harga_beli' => $_POST['harga_beli'],
            'stok' => $_POST['stok'],
            'expayer_date' => $_POST['expayer_date'],
        ];

        if ($drugModel->createDrug($data, $adminId) > 0) {
            Flasher::setFlash('Drug berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/drug/create');
            exit;
        }
    }
    public function delete($id)
    {
        $drugModel = new DrugModel();
        if ($drugModel->deleteDrug($id) > 0) {
            Flasher::setFlash('Drug berhasil', 'di hapus', 'success');
            header('Location: ' . BASEURL . '/drug');
            exit;
        } else {
            Flasher::setFlash('Drug gagal', 'di hapus', 'danger');
            header('Location: ' . BASEURL . '/drug');
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


        $drugModel = new DrugModel();
        $drug = $drugModel->getDrugById($id);

        $this->view('drug/edit', $drug);

        $this->view('layouts/footer/footer');
    }
    public function updateDrug($id)
    {
        // Create instance of Doctor model
        $drugModel = new DrugModel();

        $data = [
            'nama_obat' => $_POST['nama_obat'],
            'harga_jual' => $_POST['harga_jual'],
            'harga_beli' => $_POST['harga_beli'],
            'stok' => $_POST['stok'],
            'expayer_date' => $_POST['expayer_date'], // Set default value for specialty
        ];

        if ($drugModel->updateDrug($id, $data) > 0) {
            Flasher::setFlash('Drug berhasil', 'di update', 'success');
            header('Location: ' . BASEURL . '/drug/edit/' . $id);
            exit;
        } else {
            Flasher::setFlash('Drug gagal', 'di update', 'danger');
            header('Location: ' . BASEURL . '/drug/edit/' . $id);
            exit;
        }
    }
    
}
