<?php 

class Doctors extends Controller
{
    public function index()
    {
        $doctorModel = new Doctor_model();
        $data['doctors'] = $doctorModel->getAllDoctor();
        $this->view('doctors/index', $data);
    }

    public function show($id)
    {
        $doctorModel = new Doctor_model();
        $data['doctor'] = $doctorModel->getDoctorById($id);
        if (!$data['doctor']) {
            $this->error404();
        } else {
            $this->view('doctors/show', $data);
        }
    }

    public function create()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            $doctorModel = new Doctor_model();
            if ($doctorModel->createDoctor($data)) {
                redirect('doctors');
            } else {
                $this->view('doctors/create', ['error' => 'Gagal menambahkan dokter']);
            }
        } else {
            $this->view('doctors/create');
        }
    }

    public function edit($id)
    {
        $doctorModel = new Doctor_model();
        $data['doctor'] = $doctorModel->getDoctorById($id);
        if (!$data['doctor']) {
            $this->error404();
        } else {
            if (isset($_POST['submit'])) {
                $data = [
                    'name' => $_POST['name'],
                    'email' => $_POST['email'],
                    'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                ];

                $doctorModel = new Doctor_model();
                if ($doctorModel->updateDoctor($id, $data)) {
                    redirect('doctors');
                } else {
                    $this->view('doctors/edit', ['error' => 'Gagal mengedit dokter']);
                }
            } else {
                $this->view('doctors/edit', $data);
            }
        }
    }
}
