<?php 
class Doctors extends Controller
{
    public function index($name = null)  
{
    $role = $_SESSION['role'];

    $this->view('layouts/head');

    $loginModel = new LoginModel();
    $navView = $loginModel->getNavView($role);
    $this->view($navView);

    $doctorModel = new DoctorModel();

    // Cek apakah ada query pencarian
    if ($name) {
        $data['doctors'] = $doctorModel->searchDoctor($name);
    } else {
        $data['doctors'] = $doctorModel->getAllDoctor();
    }

    $this->view('doctors/index', $data);

    $this->view('layouts/footer');
}





public function create()  
{
    $role = $_SESSION['role'];

    $this->view('layouts/head');

    $loginModel = new LoginModel();
    $navView = $loginModel->getNavView($role);
    $this->view($navView);

    $doctorModel = new DoctorModel();
    $data['doctors'] = $doctorModel->getAllDoctor();

    $this->view('doctors/create', $data);

    $this->view('layouts/footer');
}


public function createactive()
    {
        
        $userModel = new LoginModel();
        $email = $_POST['email'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if ($userModel->isEmailExists($email)) {
            // Jika ya, berikan pesan error
            Flasher::setFlash('gagal', 'Email sudah terdaftar', 'danger');
            header('Location: ' . BASEURL . '/doctors/create');
            exit;
        }
        
        $userModel->createUser($_POST['email'], $hashed_password, 'doctor');
        $userId = $userModel->lastInsertId(); // Dapatkan ID dari user yang baru saja dibuat

        $doctorModel = new DoctorModel();
        $data = [
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'contact' => $_POST['contact'],
            'specialty' => $_POST['specialty'], // Set default value for specialty
        ];

        if ($doctorModel->createDoctor($data, $userId) > 0){
            Flasher::setFlash('berhasil', 'di tambahkan', 'success');
            header('Location: ' . BASEURL . '/doctors/create');
            exit;
        } else {
            Flasher::setFlash('gagal', 'di tambahkan', 'danger');
            header('Location: ' . BASEURL . '/doctors/create');
            exit;
        }
    }

    public function edit($id)
{

    $role = $_SESSION['role'];
    $this->view('layouts/head');

    $loginModel = new LoginModel();
    $navView = $loginModel->getNavView($role);

    $this->view($navView);


    $doctorModel = new DoctorModel();
    $doctor = $doctorModel->getDoctorById($id);

    $this->view('doctors/edit', $doctor);

    $this->view('layouts/footer');
}

public function updateDoctor($id)
{
    // Create instance of Doctor model
    $doctorModel = new DoctorModel();

    $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'contact' => $_POST['contact'],
        'specialty' => $_POST['specialty'], // Set default value for specialty
    ];

    if ($doctorModel->updateDoctor($id, $data) > 0){
        Flasher::setFlash('berhasil', 'di update', 'success');
        header('Location: ' . BASEURL . '/doctors/edit/' . $id);
        exit;
    } else {
        Flasher::setFlash('gagal', 'di update', 'danger');
        header('Location: ' . BASEURL . '/doctors/edit/' . $id);
        exit;
    }
}
public function delete($id)
{
    $doctorModel = new DoctorModel();
    if ($doctorModel->deleteDoctor($id) > 0){
        Flasher::setFlash('berhasil', 'di hapus', 'success');
        header('Location: ' . BASEURL . '/doctors');
        exit;
    } else {
        Flasher::setFlash('gagal', 'di hapus', 'danger');
        header('Location: ' . BASEURL . '/doctors');
        exit;
    }
}

}