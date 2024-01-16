<?php

class Register extends Controller
{

    public function index()
    {
       
        $data['kecamatan'] = $this->model('Patient_model')->getAllKecamatan();
        $defaultKecamatanId = isset($data['kecamatan'][0]['id']) ? $data['kecamatan'][0]['id'] : null;
        $data['desa'] = $defaultKecamatanId ? $this->model('Patient_model')->getDesaByKecamatanId($defaultKecamatanId) : [];

        $this->view('register/index', $data);
    }

    public function createactive()
    {

       
        $email = $_POST['email'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($this->model('Login_model')->isEmailExists($email)) {

            Flasher::setFlash('gagal', 'Email sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/register');
            exit;
        }

        $this->model('Login_model')->createUser($_POST['email'], $hashed_password, 'patient');
        $userId = $this->model('Login_model')->lastInsertId(); 
        
        $data = [
            'kecamatan_id' => $_POST['kecamatan_id'],
            'desa_id' => $_POST['desa_id'],
            'status_account' => $_POST['status_account'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'address' => $_POST['address'],
            'date_of_birth' => $_POST['date_of_birth'],
            'gender' => $_POST['gender'],
        ];

        if ($this->model('Patient_model')->createPatient($data, $userId) > 0) {
            Flasher::setFlash('Patient berhasil', 'di tambahkan silahkan login', 'success');
            header('Location: ' . BASEURL . '/register');
            exit;
        } else {
            Flasher::setFlash('Patient gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/register');
            exit;
        }
    }

    public function process()
    {
        
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $this->model('User_model')->createUser($_POST['email'], $hashed_password, 'super_admin');

        header('Location: ' . BASEURL . '/login/index');
    }
   
    public function getVillagesBySubdistrictId($subdistrictId)
    {
       
        $villages = $this->model('Patient_model')->getVillagesBySubdistrictId($subdistrictId);

        echo json_encode($villages);
    }
}
